CREATE TABLE event
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    "description" VARCHAR(1000),
    "date" date,
    start_time TIME,
    end_time TIME
);

INSERT INTO event(name, location, "description", "date", start_time, end_time) VALUES ('Barbeque', 'Porter Park', 'A good old-fashioned summer barbeque!', '2018-07-16', '12:00:00', '15:00:00');
INSERT INTO event(name, location, "description", "date", start_time, end_time) VALUES ('Temple Activity', 'Rexburg Temple', 'We are doing baptisms for the dead. If you have family names, please contact (123) 456-7890.', '2018-07-15', '10:00:00', '12:00:00');
INSERT INTO event(name, location, "description", "date", start_time, end_time) VALUES ('Movie Night', 'Crossroads', 'Star Wars marathon! Bring your friends!', '2018-07-15', '12:00:00', '22:00:00');
INSERT INTO event(name, location, "description", "date", start_time, end_time) VALUES ('', '', '', '2018-07-15', '12:00:00', '22:00:00');

CREATE TABLE participant
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    inumber VARCHAR(9) NOT NULL UNIQUE
);

INSERT INTO participant(name, inumber) VALUES ('Daniel Wu', '772362581');
INSERT INTO participant(name, inumber) VALUES ('John Smith', '123456789');
INSERT INTO participant(name, inumber) VALUES ('Mary Sue', '111111111');
INSERT INTO participant(name, inumber) VALUES ('James Richards', '321654987');
INSERT INTO participant(name, inumber) VALUES ('Frank West', '125976358');
INSERT INTO participant(name, inumber) VALUES ('Jane Doe', '156487325');
INSERT INTO participant(name, inumber) VALUES ('Edgar Jones', '467953816');

CREATE TABLE event_participant
(
    id SERIAL PRIMARY KEY,
    event_id INT REFERENCES event(id) NOT NULL,
    participant_id INT REFERENCES participant(id) NOT NULL,
    notes VARCHAR(1000)
);

INSERT INTO event_participant(event_id, participant_id, notes) VALUES (1, 1, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (1, 2, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (1, 3, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (1, 4, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (1, 5, '' );

INSERT INTO event_participant(event_id, participant_id, notes) VALUES (2, 1, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (2, 3, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (2, 4, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (2, 6, '' );
INSERT INTO event_participant(event_id, participant_id, notes) VALUES (2, 7, '' );

CREATE TABLE tag
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(32) NOT NULL UNIQUE
);

INSERT INTO tag(name) VALUES ('temple');
INSERT INTO tag(name) VALUES ('baptism');
INSERT INTO tag(name) VALUES ('movie');
INSERT INTO tag(name) VALUES ('bbq');
INSERT INTO tag(name) VALUES ('food');
INSERT INTO tag(name) VALUES ('game');
INSERT INTO tag(name) VALUES ('dnd');
INSERT INTO tag(name) VALUES ('outdoors');
INSERT INTO tag(name) VALUES ('crossroads');

CREATE TABLE event_tag
(
    id SERIAL PRIMARY KEY,
    event_id INT REFERENCES event(id) NOT NULL,
    tag_id INT REFERENCES tag(id) NOT NULL
);

INSERT INTO event_tag(event_id, tag_id) VALUES (1, 4);
INSERT INTO event_tag(event_id, tag_id) VALUES (1, 5);
INSERT INTO event_tag(event_id, tag_id) VALUES (1, 8);
INSERT INTO event_tag(event_id, tag_id) VALUES (2, 1);
INSERT INTO event_tag(event_id, tag_id) VALUES (2, 2);
INSERT INTO event_tag(event_id, tag_id) VALUES (3, 3);
INSERT INTO event_tag(event_id, tag_id) VALUES (3, 9);


-- CREATE TABLE registration
-- (
--     id SERIAL PRIMARY KEY,
--     participant_id INT REFERENCES participant(id) NOT NULL,
--     event_id INT REFERENCES event(id) NOT NULL,
--     notes VARCHAR(1000)
-- );

-- CREATE TABLE game_table
-- (
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     "description" VARCHAR(1000),
--     game_master_id INT REFERENCES participant(id)
-- );

-- CREATE TABLE game_table_participant
-- (
--     id SERIAL PRIMARY KEY,
--     game_table_id INT REFERENCES game_table(id) NOT NULL,
--     participant_id INT REFERENCES participant(id) NOT NULL
-- );

-- CREATE TABLE event_game_table
-- (
--     id SERIAL PRIMARY KEY,
--     event_id INT REFERENCES event(id) NOT NULL,
--     game_table_id INT REFERENCES game_table(id) NOT NULL
-- );
