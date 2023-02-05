CREATE SCHEMA IF NOT EXISTS system;

CREATE TABLE IF NOT EXISTS system."user"
(
    coduser integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    name character varying(255) COLLATE pg_catalog."default",
    username character varying(255) COLLATE pg_catalog."default",
    password character varying(255) COLLATE pg_catalog."default",
    blocked character(1) COLLATE pg_catalog."default" DEFAULT 0,
    registered timestamp without time zone DEFAULT 'now()',
    CONSTRAINT coduser_pkey PRIMARY KEY (coduser)
)

