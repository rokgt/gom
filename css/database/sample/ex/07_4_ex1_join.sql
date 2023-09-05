-- 0. join이란?
--  		두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것입니다.
--   		

SELECT emp.emp_no,emp.first_name,emp.last_name, dp.dept_no
FROM employees emp
	INNER JOIN dept_emp dp
		ON emp.emp_no=dp.emp_no
		AND dp.to_date>=NOW();
		

SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp		
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no=dm.emp_no
		AND dm.to_date >=NOW()
WHERE emp.emp_no>=110000;	


SELECT * FROM employees where emp_no=10001 OR emp_no=10005
UNION ALL 
SELECT * FROM employees where  emp_no=10005;


ALTER TABLE employees ADD COLUMN sup_no INT(11);

SELECT emp2.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no;