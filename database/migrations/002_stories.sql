CREATE TABLE stories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    topic_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(200) NOT NULL,
    angle VARCHAR(255) NOT NULL,
    summary TEXT NOT NULL,
    facts TEXT NOT NULL,
    sources TEXT NOT NULL,
    visual_direction TEXT NOT NULL,
    status ENUM('draft', 'approved') NOT NULL DEFAULT 'draft',
    FOREIGN KEY (topic_id) REFERENCES topics(id)
);
