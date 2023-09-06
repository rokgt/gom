-- case~ when~else~end:다중분기를 위해 사용합니다.
SELECT e.emp_no
		,e.gender
		,case e.gender
			when 'M' then'남자'
			ELSE '여자'
		END AS ko_gender	
FROM employees AS e;

UPDATE titles
SET to_date=NULL
WHERE emp_no=500000;

SELECT *
FROM titles
WHERE emp_no = 500000;


--  직책 테이블의 모든 정보를 출력해주세요
-- 단,to_date가 null또는 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은 아님'

SELECT *,
case date(ifnull(to_date,99990101))
		when NULL then '현재직책'
		when 99990101 then '현재직책'
		ELSE '지금은아님'
		END AS ti
FROM titles
ORDER BY emp_no desc;


SELECT *
FROM titles
WHERE to_date IS NOT NULL;

-- 3. 문자열 함수

SELECT CONCAT('안녕','하세요');	

SELECT CONCAT_WS ('/','딸기','바나나','토마토','수박');
SELECT FORMAT(123456,0);

-- left(문자열,길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환합니다.

SELECT LEFT('123456',3);

-- right(문자열,길이) : 문자열을 오른쪽쪽부터 길이만큼 잘라 반환합니다.

SELECT right('123456',3);

--  upper(문자열):소문자를 대문자로 변경합니다.

SELECT UPPER('asdf');

-- lower(문자열):대문자를 소문자로 변경합니다.
SELECT lowER('ASDF');

-- lpad(문자열,길이, 채울 문자열):문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣

SELECT LPAD ('1234567',10,'0');

-- rpad(문자열,길이, 채울 문자열):문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣

SELECT rPAD ('1234567',10,'rk');

SELECT ' 1234 ', TRIM(' 1234 ');

SELECT lTRIM(' 1234 ');

SELECT rTRIM(' 1234 ');

-- substring

SELECT SUBSTRING('asdfghj',3,2);

SELECT SUBSTRING_INDEX ('as.df.gh.jk','.',2);

-- 4.수학함수

-- ceilng(숫자):올림합니다.
SELECT CEIL(1.4);
-- floor:버림합니다
SELECT FLOOR(0.4);
-- round:반올림합니다
SELECT round(1.5),round(1.4);

-- 5. 날짜 및 시간함수

SELECT NOW(), DATE(NOW()), DATE(99990101);

SELECT ADDDATE(99990101, INTERVAL 1 DAY);

SELECT SUBDATE(99990101, INTERVAL 1 DAY);

SELECT ADDTIME(20230101000000,'-01:00:00');

SELECT SUBTIME(20230101000000,'-01:00:00');

SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);

SELECT ADDDATE(DATE(NOW()), INTERVAL -1 YEAR);

-- 6.순위함수

SELECT emp_no, salary,RANK() OVER(ORDER BY salary desc)AS RANK
FROM salaries
LIMIT 5;

SELECT emp_no, salary, row_number() OVER(ORDER BY salary desc)AS RANK
FROM salaries
LIMIT 5;


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

