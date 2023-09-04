-- update의 기본구조
-- update 테이블명
-- set (컬럼1=값1,컬럼2=값2)
-- where 조건
-- **추가 설명 :조건을 적지 않을경우 모든 레코드가 수정됩니다.
-- 				실수를 방지하기 위해 where절을 먼저 작성하고 set절을 작성하는것

UPDATE titles
SET
	title= 'ceo'

WHERE emp_no=500000;

SELECT *
FROM titles
WHERE emp_no = 500000;


-- 500000번 사원의 직급을 'staff',연봉을 '25000'

UPDATE titles
SET title='staff'
WHERE emp_no=500000;


UPDATE salaries
SET salary=25000
WHERE emp_no=500000;

SELECT *
FROM titles
order by emp_no desc;
		
SELECT *
FROM salaries
order by emp_no DESC;	

		