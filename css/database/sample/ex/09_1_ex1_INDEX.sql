-- index 란?
-- 검색성능의 속도를높여주는 기능
-- 인덱스 생성시 데이터를 오름차순으로 정렬
-- 일반적으로 db에서는 "B+tree인덱스"방식을 사용
-- index 확인
-- show index from 테이블

SHOW INDEX FROM employees;

-- create index 인덱스명 on 테이블(칼럼);
-- create index 인덱스명 on 테이블(칼럼1,컬럼2...);

CREATE INDEX idx_employees_last_name ON employees(last_name);

-- index제거
--  drop index 인덱스명 on 테이블;
DROP INDEX idx_employees_last_name ON employees;