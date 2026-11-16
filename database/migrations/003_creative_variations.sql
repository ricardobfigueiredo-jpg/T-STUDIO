CREATE TABLE creative_variations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    story_id BIGINT UNSIGNED NOT NULL,
    kind ENUM('hook', 'cta') NOT NULL,
    strategy VARCHAR(150) NOT NULL,
    copy_text TEXT NOT NULL,
    visual_direction TEXT,
    FOREIGN KEY (story_id) REFERENCES stories(id)
);
