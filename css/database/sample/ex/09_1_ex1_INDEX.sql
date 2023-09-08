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


-- 스토어드 프로시저 (stored procedure)
-- 일련으 ㅣ쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합

-- 스토어드 프로시저으 ㅣ장점
--  하나의 요청으로 여러 sql문을 실행하여,네트워크에 대한 부하감소
-- 미리 구문 분석및 내부 중가 코드로 변환을 끝내야 하므로 처리 시간이 감소
-- 데이터베이스 트리거와 결합하여 복잡한 규칙에 의한 데이터의 참조무결성 유지가 가능

-- 스토어드 프로시ㄷ저의 단점
-- 사양 변경시 외부 응용 프로그램과 함께 프로시저의 정의 변경이 필요
-- 코드 자산으로서의 재사용성이 매우 비효율적


DELIMITER $$
CREATE PROCEDURE test()
BEGIN
	SELECT emp.*,tit.title
	FROM employees emp
		INNER join titles tit
			ON emp.emp_no=tit.emp_no
	WHERE tit.to_date>=NOW();
END $$	
DELIMITER ;



SHOW procedure STATUS;

CALL TEST();

DROP PROCEDURE test;