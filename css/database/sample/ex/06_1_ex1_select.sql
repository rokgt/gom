-- SELECT [컬럼명] FROM [테이블명];
SELECT *FROM employees;
SELECT * FROM dept_emp;

-- 
SELECT first_name,last_name FROM employees;
SELECT emp_no, title FROM titles;


-- -- SELECT [컬럼명] FROM [테이블명] where [ 쿼리조건];
-- [ 쿼리조건] : 컬럼명 [기호] 조건값
SELECT * FROM employees WHERE emp_no <= 10009;
SELECT * FROM employees WHERE first_name = 'Mary';
SELECT * FROM employees WHERE birth_date>= 19600101;

-- and연산자
SELECT *
FROM employees 
WHERE birth_date <= 19700101 
 and birth_date >= 19650101; 

SELECT * 
FROM employees
WHERE first_name = 'Mary'
 AND last_name = 'piazza'; 
 
SELECT * 
FROM employees
WHERE first_name = 'Mary'
 OR last_name = 'piazza';
 
--
SELECT *
FROM employees
WHERE emp_no >=10005
  AND emp_no <=10010;
  
SELECT *
FROM employees
WHERE emp_no between 10005 AND 10010;

SELECT *
FROM employees
WHERE emp_no=10005 or emp_no=10010;

SELECT *
FROM employees
WHERE emp_no IN(10005, 10010);

-- 이름이 'ge'로 시작하는 사람 like('ge%'); % 위치에 따라 ge가 오는 위치가 달라진다 

SELECT *
FROM employees
WHERE first_name LIKE('ge%');
 
SELECT *
FROM employees
WHERE first_name LIKE('%ge'); 

SELECT *
FROM employees
WHERE first_name LIKE('%ge%');

SELECT *
FROM titles
WHERE title LIKE('%staff%');

-- 한글자만 오게 하는 like('_ge') 언더바의 개수만큼 문자가 들어간다

SELECT *
FROM employees
WHERE first_name LIKE('__ge_');

-- Order by로 정렬하여 조회 asc(오름차순)가 default값이다.desc(내림차순)
SELECT *
FROM employees ORDER BY birth_date;
SELECT *
FROM employees ORDER BY birth_date DESC;

-- birth_day먼저 정렬하고 정렬한 것 기준으로 first_name을 정렬해준다

SELECT *
FROM employees ORDER BY birth_date, first_name; 

-- 성을 내림차순으로 정렬하고, 이름을 오름차순으로 생일을 오름차순으로 정렬해주세요.

SELECT *
FROM employees ORDER BY last_name DESC , first_name, birth_date;

-- distint로 중복되는 레코드 없이 조회

SELECT emp_no,salary FROM salaries WHERE emp_no=10001;
SELECT DISTINCT emp_no,salary FROM salaries WHERE emp_no = 10001;

-- 5. 집계 함수

SELECT sum(salary) FROM salaries;

--  현재 받고있는 급여만 조회해주세요.

SELECT *FROM salaries WHERE to_date >= 99990101;
 
-- sum(컬럼명): 합계를 구합니다.
SELECT sum(salary) FROM salaries WHERE to_date >= 99990101;

-- max(컬럼명): 최대값을  구합니다.
SELECT max(salary) FROM salaries WHERE to_date >= 99990101;

-- min(컬럼명): 최소값을 구합니다.
SELECT min(salary) FROM salaries WHERE to_date >= 99990101;

-- avg(컬럼명): 평균을 구합니다.
SELECT avg(salary) FROM salaries WHERE to_date >= 99990101;

-- count(컬럼명): 개수를 구합니다.
SELECT COUNT(*) FROM employees;

-- 이름이 mary인 사람의 수를 구해주세요.

SELECT COUNT(emp_no)FROM employees WHERE first_name='mary';

-- 그룹으로 묶어서 조회 :group by 컬럼명 [having 집계 함수 조건]

SELECT title, COUNT(title)
FROM titles
WHERE to_date>=20230901
GROUP BY title HAVING title LIKE('%staff%');

-- 속성명에 "as"를 이용하여 별칭을 줄 수 있습니다. 주고싶은 컬럼 뒤에다 붙으면 된다.

SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date>=20230901
GROUP BY title HAVING title LIKE('%staff%');

-- concat():문자열을 합쳐주는 함수

SELECT CONCAT(first_name, ' ',last_name) AS full_name
FROM employees;

-- 여자사원의 사번,생일, 풀네임을 출력해주세요.

SELECT emp_no,birth_date, CONCAT(first_name, ' ' ,last_name) AS full_name
FROM employees 
WHERE gender='F' ORDER BY full_name;

-- limit로 출력 개수를 제한하여 조회
-- limit n :n개만큼 출력
-- limit n offset n: n번째부터 n개만큼 출력
SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10 OFFSET 10;

-- 재직중인 사원들중 급여가 상위 5위까지 출력해주세요.

SELECT  emp_no,salary
FROM salaries
WHERE to_date>=20230901
ORDER BY salary DESC LIMIT 5; 

-- 서브쿼리(subquery):쿼리 안에 또다른 쿼리가 있는 형태
-- doo2부서의 현재 매니저의 이름을 가져오고 싶다.

SELECT *
FROM employees
WHERE emp_no = (
SELECT emp_no 
FROM dept_manager 
WHERE to_date>=20230901 
AND dept_no='d002');

-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해 주세요.

SELECT emp_no,CONCAT(first_name, ' ',last_name) AS full_name
FROM employees
WHERE emp_no =(
SELECT emp_no
FROM salaries
WHERE to_date>=20230901
ORDER BY salary desc LIMIT 1);

-- d001의 매니저를 한번이라도 해본사람 서브쿼리의 결과가 복수일 때 사용방법
-- in or뜻을 가진다  any서브쿼리에서만 사용 or뜻을 가진다  all 전부 만족하는거

SELECT emp_no,CONCAT(first_name, ' ',last_name) AS full_name
FROM employees
WHERE emp_no IN (
SELECT emp_no
FROM dept_manager
WHERE dept_no = 'd001');

-- 현재 직책이 senior Engineer인 사원의 사번과 생일을 출력해주세요.

SELECT emp_no,birth_date
FROM employees
WHERE emp_no IN (
SELECT emp_no
FROM titles
WHERE to_date>=20230901 and title='senior Engineer');

-- 다중열 서브쿼리

SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
SELECT dept_no, emp_no
FROM dept_manager
WHERE to_date >= NOW()
);

-- select절에 사용하는 서브쿼리
-- 사원의 현재 급여,현재 급여를 받기 시작한 일자,풀네임을 출력해주세요.
SELECT 
sal.salary,sal.from_date,(SELECT CONCAT(emp.first_name,'',emp.last_name) 
FROM employees AS emp
WHERE sal.emp_no = emp.emp_no)AS full_name
FROM salaries AS sal
WHERE to_date>=NOW();

-- from 절에 오는 서브쿼리

SELECT emp.*
FROM (
SELECT*
FROM employees
WHERE gender = 'm')AS emp;

-- 직책 테이블의 모든 정보를 조회해주세요.

SELECT *
FROM titles;

-- 급여가 60,000이하인 사원의 사번을 조회해 주세요.

SELECT emp_no
FROM salaries
WHERE salary<=60000;

-- 급여가 60,000에서 70,000인 사원의 사번을 조회해주세요.

SELECT emp_no
FROM salaries
WHERE salary >=60000
and	salary <=70000;

-- 사원번호가 10001,10005인 사원의 모든 정보를 조회해주세요.

SELECT *
FROM employees
WHERE emp_no IN (10001,10005);

-- 직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요.

SELECT emp_no,title
FROM titles
WHERE title LIKE('%engineer%');
-- 사원 이름을 오름 차순으로 정렬해서 조회해주세요.

SELECT first_name
FROM employees
ORDER BY  first_name;

-- 사원별 급여의 평균을 조회해주세요.

SELECT emp_no,avg(salary)
from salaries
GROUP BY emp_no;



-- 사원별 급여의 평균이 30,000~50,000인,사원번호와 평균급여를 조회해주세요.

SELECT emp_no,AVG(salary) AS avg_sal
FROM salaries
group BY emp_no
	HAVING avg_sal>=30000 AND avg_sal <=50000;
-- where은 전체에 대한 조건 having은 그룹에 대한 조건 where우선실행

-- 사원별 급여 평균이 70,000이상인,사원의 사번, 이름,성, 성별을 조회해 주세요.
SELECT emp.emp_no,emp.first_name,emp.last_name,emp.gender
FROM employees as emp
WHERE emp_no IN (
SELECT sal.emp_no
FROM salaries AS sal
group by sal.emp_no 
	HAVING AVG(sal.salary)>=70000);

-- 현재 직책이 "senior engineer"인, 사원의 사원번호와 성을 조회해 주세요.

SELECT emp.emp_no,
emp.last_name
FROM employees AS emp
WHERE emp.emp_no in(
SELECT tit.emp_no
FROM titles AS tit
WHERE tit.to_date>=NOW() .ti tittle='senior engineer');