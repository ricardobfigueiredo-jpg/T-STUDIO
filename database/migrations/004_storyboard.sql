CREATE TABLE storyboard_scenes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    story_id BIGINT UNSIGNED NOT NULL,
    sequence_number INT UNSIGNED NOT NULL,
    narrative_role VARCHAR(100) NOT NULL,
    narration TEXT NOT NULL,
    visual_direction TEXT NOT NULL,
    duration_seconds INT UNSIGNED NOT NULL,
    UNIQUE (story_id, sequence_number),
    FOREIGN KEY (story_id) REFERENCES stories(id)
);
