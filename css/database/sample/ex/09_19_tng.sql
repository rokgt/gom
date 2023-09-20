 INSERT INTO employees (
	    emp_no 
	    ,birth_date 
	    ,first_name 
	    ,last_name
	    ,gender 
	    ,hire_date) 
	VALUE  (500001
	,19820130
	,'yoo'
	,'hyunho'
	,'M'
	,20230817);
	
-- 	 2. 현재 급여가 80,000이상인 사원을 조회하기

SELECT emp.*,sal.salary
FROM employees emp
INNER JOIN salaries sal
ON emp.emp_no=sal.emp_no
WHERE sal.to_date>=NOW()
		AND sal.salary>=100000;
		
INSERT INTO employees
VALUES (	
		700000
		,20000101
		,'first'
		,'last'
		,'M'
		,20230919
		,NULL
);
SELECT emp.*
FROM employees emp		
	LEFT OUTER JOIN titles tit
		ON emp.emp_no=tit.emp_no
	
WHERE tit.title IS NULL;
-- 	2-1.직책은 "green",시작일은 현재시간, 종료일은 99990101
INSERT INTO titles
VALUES (
		700000
		,'green'
		, NOW()
		,99990101
		);


		
