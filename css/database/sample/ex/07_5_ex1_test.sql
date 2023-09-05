-- 1.사원의 사원번호, 출네임, 직책명을 출력해 주세요.

SELECT emp.emp_no, concat(emp.first_name,' ',emp.last_name),tit.title
FROM employees as emp
	INNER JOIN titles AS tit
		ON emp.emp_no=ti.emp_no;

-- 2.사원의 사원번호, 성별, 현재 월급을 출력해 주세요.

SELECT emp.emp_no,emp.gender,sal.salary
FROM employees as emp
	INNER JOIN salaries AS sal
		ON emp.emp_no=sal.emp_no
		AND to_date>=NOW();

-- 3.10010사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해주세요.

SELECT emp.emp_no,CONCAT(emp.first_name,' ',emp.last_name)AS full_name,sal.salary
FROM employees AS emp
INNER JOIN salaries AS sal
		ON emp.emp_no=sal.emp_no
WHERE emp.emp_no=10010;		

-- 4 사원의 사원번호, 풀네임,소속부서명을 출력해주세요.

SELECT emp.emp_no, CONCAT (emp.first_name,' ',emp.last_name)AS full_name,dp.dept_name
FROM employees AS emp
INNER JOIN dept_emp as dt
		ON emp.emp_no=dt.emp_no
INNER JOIN departments AS dp
		ON dt.dept_no=dp.dept_no
WHERE dt.to_date>=NOW();	

-- 5,현재월급의 상위 10위까지 사원의 사번,풀네임, 월급을 출력해주세요.

SELECT emp.emp_no,CONCAT(emp.first_name,' ',emp.last_name)AS full_name,sal.salary
FROM employees as emp
	INNER JOIN salaries AS sal
		ON emp.emp_no=sal.emp_no
where to_date>=NOW()
order BY sal.salary DESC LIMIT 10;		

-- 6.각 부서의 부서장의 부서명, 풀네임,입사일을 출력해주세요.

SELECT dp.dept_name,CONCAT (emp.first_name,' ',emp.last_name)AS full_name,emp.hire_date
FROM employees AS emp
	INNER JOIN dept_manager AS dt
	ON emp.emp_no=dt.emp_no
	INNER JOIN departments AS dp
	ON dt.dept_no=dp.dept_no
WHERE to_date>=NOW();	 

-- 7.현재 직책이 "staff"인 사원의 현재 전체 평균 월급을 출력해주세요.

SELECT AVG(sal.salary) AS a_sal,ti.title
FROM titles ti
	INNER JOIN salaries sal
	ON ti.emp_no=sal.emp_no
WHERE  ti.title='staff'and sal.to_date AND ti.to_date>=NOW();

SELECT AVG(sal.salary) AS a_sal,ti.title
FROM titles ti
	INNER JOIN salaries sal
	ON ti.emp_no=sal.emp_no
WHERE  ti.title='staff'and sal.to_date AND ti.to_date>=NOW()
GROUP BY ti.title;

-- 8.부서장직을 역임했던 모든사원의 풀네임과 입사일, 사번,부서번호를 출력해 주세요.

SELECT emp.emp_no,CONCAT(emp.first_name,' ',emp.last_name),emp.hire_date, dt.dept_no
FROM employees emp
 INNER JOIN dept_manager dt
 	ON emp.emp_no=dt.emp_no;

-- 9.현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균 월급(점수)를 내림차순으로 출력해주세요.

SELECT ti.title, floor(AVG(sal.salary))AS a_sal
FROM titles ti
	INNER JOIN salaries sal
		ON ti.emp_no=sal.emp_no
WHERE sal.to_date>=NOW() AND ti.to_date>=NOW()	
GROUP BY ti.title  HAVING a_sal >=60000
ORDER BY AVG(sal.salary) desc

;


-- 10.성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.

SELECT COUNT(emp.gender),ti.title
FROM titles ti
INNER JOIN employees emp
	ON emp.emp_no=ti.emp_no
WHERE emp.gender='f'AND ti.to_date>=NOW()
GROUP BY ti.title;



--  퇴사한 여직원의 수
SELECT emp.gender,COUNT(*)
FROM employees emp 
	INNER JOIN (
		SELECT emp_no
		FROM titles t
		GROUP BY t.emp_no HAVING MAX(t.to_date) !=99990101) tit
		ON emp.emp_no= tit.emp_no
GROUP BY emp.gender;		
		
--  != 같지않다라는 의미		
		
		