USE student;
SELECT * FROM test;

INSERT INTO test (col_number, col_string, col_dttm) VALUES(1, 'One', now());
INSERT INTO test (col_number, col_string, col_dttm) VALUES(2, 'Two', now());
INSERT INTO test (col_number, col_string, col_dttm) VALUES(3, 'Three', now());

SELECT * FROM test WHERE col_string = 'Two' OR 1=1 -- AND col_number = 2