USE library_db;

CREATE TABLE lib_member (
    m_user VARCHAR(40) NOT NULL,
    m_pass VARCHAR(20) NOT NULL,
    m_name VARCHAR(50) NOT NULL,
    m_phone VARCHAR(10) NULL,
    PRIMARY KEY (m_user)
);

CREATE TABLE lib_book (
    b_id VARCHAR(6) NOT NULL,
    b_name VARCHAR(60) NOT NULL,
    b_writer VARCHAR(50) NULL,
    b_category VARCHAR(2) NOT NULL,
    b_price NUMERIC(4) NULL,
    PRIMARY KEY (b_id)
);

CREATE TABLE lib_borrow_book (
    br_date_br DATE NOT null default now(),
    br_date_rt DATE not null default '1990-01-01',
    b_id VARCHAR(6) NOT NULL,
    m_user VARCHAR(40) NOT NULL,
    br_fine NUMERIC(3) NULL,
    PRIMARY KEY (br_date_br, b_id, m_user),
    CONSTRAINT FOREIGN KEY fk_b_id(b_id) REFERENCES lib_book(b_id)
        ON DELETE CASCADE ON UPDATE CASCADE,  -- ON UPDATE CASCADE added
    CONSTRAINT FOREIGN KEY fk_m_user(m_user) REFERENCES lib_member(m_user)
        ON DELETE CASCADE ON UPDATE CASCADE   -- ON UPDATE CASCADE added
);