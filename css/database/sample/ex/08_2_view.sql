-- VIEW?란
--  가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다.
-- 여러테이블을 조인 할 시에 view를 생성하여,
-- 복잡한 sql을 편리하게 조회할수 있는 장점이 있습니다.

-- 2. view생성
-- 	create [or replace] view 뷰명
--  	as
-- 		select문
--    ;
-- **[or replace]:기존의 뷰가 있을경우 덮어쓰기를 합니다.
-- 인덱스를 사용할수 없어서 느리다.

SELECT emp.*
FROM employees emp
	INNER join titles tit
		ON emp.emp_no=tit.emp_no
WHERE tit.to_date>=NOW();


CREATE VIEW view_employed_emp
AS 
	SELECT emp.*,tit.title
	FROM employees emp
		INNER join titles tit
			ON emp.emp_no=tit.emp_no
	WHERE tit.to_date>=now();	
	
SELECT *FROM view_employed_emp;		