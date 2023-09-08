-- 1.사원 정보 테이블에 각자의 정보를 적절하게 넣어주세요.

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19820130
	,'hyunho'
	,'yoo'
	,'m'
	,20230817
);

-- 2 월급, 직책,소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.

INSERT INTO salaries(
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,50000
	,20230817
	,NOW()
);	


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES(
	500001
	,'d007'
	,20230817
	,NOW()
);	

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)	
VALUES (
	500001
	,'staff'
	,20230817
	,NOW()
);


-- 3짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19990521
	,'hwiya'
	,'kang'
	,'F'
	,20230907
);

INSERT INTO salaries(
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,2000000
	,20230907
	,99990101
);	


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES(
	500002
	,'d010'
	,20230907
	,99990101
);	

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)	
VALUES (
	500002
	,'sabotajyu'
	,20230907
	,99990101
);


-- 4나와 짝궁의 소속부서를 d009로 변경해 주세요.

UPDATE dept_emp
SET
	to_date=NOW()
WHERE emp_no=500001 AND dept_no='d007';

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES(
	500001
	,'d009'
	,NOW()
	,99990101
);	

SELECT * FROM dept_emp WHERE emp_no=500001 or emp_no=500002;


-- 5.짝궁의 모든 정보를 삭제해 주세요.
DELETE from employees
WHERE emp_no=500001;

DELETE from dept_emp
WHERE emp_no=500001;

DELETE FROM salaries
WHERE emp_no=500001;

DELETE from titles
WHERE emp_no=500001;


-- 6.'d009'부서의 관리자를 나로 변경해주세요.
INSERT INTO  dept_manager(
		dept_no
		,emp_no
		,from_date
		,to_date
)		
VALUES (	
		'd009'
		,500001
		,20230907
		,99990101
);
UPDATE dept_manager
SET to_date=20230906
WHERE emp_no=111939;

-- 7.오늘 날짜부로 나의 직책을 'senior Engineer'로 변경해주세요
UPDATE titles
SET to_date=NOW()
WHERE emp_no=500001 AND title='staff';

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)	
VALUES (
	500001
	,'senior Engineer'
	,NOW()
	,99990101
);


-- 8.최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해주세요.

SELECT emp.emp_no,emp.last_name
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no=sal.emp_no
	AND ( sal.salary=(SELECT min(salary) FROM salaries )
	OR sal.salary=(SELECT max(salary) FROM salaries ))
; 

SELECT emp.emp_no,emp.last_name
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no=sal.emp_no
	AND ( sal.salary=(SELECT salary FROM salaries ORDER BY salary LIMIT 1)
	OR sal.salary=(SELECT salary FROM salaries ORDER BY salary LIMIT 1))
; 

CREATE INDEX idx_test ON salaries(salary);


	
-- 9.전체 사원의 평균 연봉을 출력해 주세요.

SELECT AVG(salary)
FROM salaries;

SELECT AVG(salary)
FROM salaries
WHERE to_date<=99990101;


-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.

SELECT AVG(salary) AS a_sal
FROM salaries
WHERE emp_no=499975;

