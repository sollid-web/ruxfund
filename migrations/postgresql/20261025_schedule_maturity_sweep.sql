-- Requires pg_cron to be available/enabled on the Supabase PostgreSQL project.
-- Replaces the named job on re-application, keeping only one maturity sweep.
CREATE EXTENSION IF NOT EXISTS pg_cron WITH SCHEMA pg_catalog;

DO $$
DECLARE
    existing_job_id bigint;
BEGIN
    SELECT jobid INTO existing_job_id
    FROM cron.job
    WHERE jobname = 'ruxfund-maturity-sweep';

    IF existing_job_id IS NOT NULL THEN
        PERFORM cron.unschedule(existing_job_id);
    END IF;

    PERFORM cron.schedule(
        'ruxfund-maturity-sweep',
        '* * * * *',
        $job$
            UPDATE public.transaction AS t
            SET closed = 1,
                closetime = t.updated + (p.num::bigint * p.calc::bigint * 3600)
            FROM public.plan AS p
            WHERE t.plan = p.id
              AND t.type = 'Deposit'
              AND t.status = 1
              AND t.closed = 0
              AND t.updated + (p.num::bigint * p.calc::bigint * 3600)
                    <= EXTRACT(EPOCH FROM clock_timestamp())::bigint;
        $job$
    );
END
$$;
