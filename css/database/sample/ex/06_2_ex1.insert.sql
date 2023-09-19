-- Insert
-- Insert Into 테이블 명 [(속성1,속성2)] []생략가능하지만 값을 다 입력해줘야된다.
-- values (속성1,속성2)

-- 500000 신규회원
INSERT INTO employees(
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,NOW()
	,'meerkat'
	,'green'
	,'M'
	,NOW()
);


SELECT *
FROM employees
WHERE emp_no = 500000;

-- 500000번 사원의 급여 데이터를 삽입해주세요

INSERT INTO salaries(
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,100000
	,20230904	
	,99990101	
);
COMMIT;

SELECT *
FROM salaries
WHERE emp_no = 500000;


-- 500000번 사원의 소속 서 데이터를 삽입해주세요.

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES(
	500000
	,'d007'
	,20230904
	,99990101
);	

COMMIT;

SELECT *
FROM dept_emp
WHERE emp_no = 500000;

-- 500000번 사원의 직책  데이터를 삽입해주세요

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)	
VALUES (
	500000
	,'staff'
	,20230904
	,99990101
);

SELECT *
FROM titles
WHERE emp_no = 500000;


UPDATE departments

SET dept_name='php504'

WHERE dept_name='d010';


INSERT into departments(
	dept_no
	,dept_name	
)
VALUES (
	'd010'
	,'php504'
	);

		

