--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: crops; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE crops (
    id integer NOT NULL,
    phl_no bigint,
    old_accession_no bigint,
    gb_no bigint,
    collecting_no character varying(100),
    name character varying(255),
    dialect character varying(255),
    source character varying(255),
    scientific_name character varying(255),
    country character varying(50),
    province character varying(100),
    town character varying(100),
    barangay character varying(100),
    sitio character varying(100),
    acquisition_date character varying(100),
    remarks text,
    latitude double precision,
    longitude double precision,
    altitude double precision,
    collection_source character varying(255),
    gen_stat character varying(255),
    sam_type character varying(255),
    sam_met character varying(255),
    mat character varying(255),
    topo character varying(255),
    site character varying(255),
    soil_tex character varying(255),
    drain character varying(255),
    soil_col character varying(255),
    ston character varying(255)
);


ALTER TABLE public.crops OWNER TO postgres;

--
-- Name: crops_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE crops_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.crops_id_seq OWNER TO postgres;

--
-- Name: crops_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE crops_id_seq OWNED BY crops.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY crops ALTER COLUMN id SET DEFAULT nextval('crops_id_seq'::regclass);


--
-- Data for Name: crops; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY crops (id, phl_no, old_accession_no, gb_no, collecting_no, name, dialect, source, scientific_name, country, province, town, barangay, sitio, acquisition_date, remarks, latitude, longitude, altitude, collection_source, gen_stat, sam_type, sam_met, mat, topo, site, soil_tex, drain, soil_col, ston) FROM stdin;
\.


--
-- Name: crops_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('crops_id_seq', 9, true);


--
-- Name: crops_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY crops
    ADD CONSTRAINT crops_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

