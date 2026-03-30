CREATE DATABASE iranwar;
\c iranwar

-- Création des tables
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL, -- UNIQUE pour éviter les doublons
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL -- UNIQUE pour des URLs propres
);

CREATE TABLE articles (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL, -- Pour l'URL Rewriting (Point 1 barème)
    
    -- SEO Fields
    meta_title VARCHAR(255),
    meta_description TEXT,
    
    -- Media
    img_url VARCHAR(255),
    img_alt VARCHAR(255), -- Obligatoire pour ton barème (Point 5)
    
    -- Relations
    category_id INT NOT NULL,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);