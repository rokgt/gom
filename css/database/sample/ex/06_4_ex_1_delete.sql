-- delete의 기본구조
-- delete from테이블명
-- ** where조건
-- 	**추가설명 :조건을 적지 않을 경우 모든 레코드가 삭제 됩니다.
-- 					실수를 방지하기위해 WHERE 먼저 작성하고 DELETE FROM 작성한다
INSERT INTO departments(
	dept_no
	,dept_name
)

VALUES (
	'd010'
	,'sabotajyu'
);	

SELECT * FROM departments;	

DELETE FROM departments
WHERE dept_no = 'd010';

SELECT *FROM departments;


-- 사원정보 테이블에서 사원번호가 500001이상인 사원의 데이터를 모두 삭제해주세요

DELETE FROM employees
WHERE emp_no=500001;

SELECT *FROM employees ORDER BY emp_no desc;


