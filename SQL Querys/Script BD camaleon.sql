/* CUENTAS PUC */

CREATE TABLE puc_clase(
	id serial PRIMARY KEY,
	codigo VARCHAR(1) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT NOT NULL,
	ajuste VARCHAR(10) NOT NULL,
	naturaleza VARCHAR(10) NOT NULL,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE puc_grupo(
	id serial PRIMARY KEY,
	codigo VARCHAR(2) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT NOT NULL,
	ajuste VARCHAR(10) NOT NULL,
	nativa BOOLEAN NOT NULL DEFAULT false,
	clase_id integer REFERENCES puc_clase (id),
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE puc_cuenta(
	id serial PRIMARY KEY,
	codigo VARCHAR(4) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT NOT NULL,
	ajuste VARCHAR(10) NOT NULL,
	nativa BOOLEAN NOT NULL DEFAULT false,
	grupo_id integer REFERENCES puc_grupo (id),
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE puc_subcuenta(
	id serial PRIMARY KEY,
	codigo VARCHAR(6) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT NOT NULL,
	ajuste VARCHAR(10) NOT NULL,
	nativa BOOLEAN NOT NULL DEFAULT false,
	cuenta_id integer REFERENCES puc_cuenta (id),
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE puc_cuentaauxiliar(
	id serial PRIMARY KEY,
	codigo VARCHAR(10) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT NOT NULL,
	ajuste VARCHAR(10) NOT NULL,
	tercero_activo BOOLEAN NOT NULL,
	estado BOOLEAN NOT NULL,
	subcuenta_id integer REFERENCES puc_subcuenta (id),
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);


