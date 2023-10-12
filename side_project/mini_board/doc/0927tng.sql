-- 1.직책테이블의 모든 정보를 조회해주세요.

SELECT titles;

-- 2.급여가 60,000이하인 사원의 사번을 조회해 주세요.

SELECT emp_no
FROM salaries
WHERE salary<=60000 AND to_date>=NOW();

-- 3.급여가 60,000에서 70,000인 사원의 사번을 조회해주세요.

SELECT emp_no
FROM salaries
WHERE salary>=60000 AND salary<=70000 AND to_date>=NOW();

-- 4.사원번호가 10001,10005인 사원의 모든 정보를 조회해 주세요.

SELECT emp.*,dp_emp.dept_no,tit.title,sal.salary
FROM employees emp
	INNER JOIN
		titles tit
		ON emp.emp_no=tit.emp_no
		AND tit.to_date>=NOW()
		INNER JOIN 
		dept_emp dp_emp
		ON tit.emp_no=dp_emp.emp_no
		AND dp_emp.to_date>=NOW()
		INNER JOIN 
		salaries sal
		ON emp.emp_no=sal.emp_no
		AND sal.to_date>=NOW()	
		
WHERE emp.emp_no=10001 OR emp.emp_no=10005;

-- 5.직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요.

SELECT emp_no,title
FROM titles
WHERE title LIKE ('%engineer%')AND to_date>=NOW();

-- 6.사원 이름을 오름차순으로 정렬해서 조회해 주세요.

SELECT *
FROM employees
ORDER BY first_name ;

-- 7. 사원별 급여의 평균을 조회해 주세요.

SELECT AVG(salary)
FROM salaries;

SELECT emp_no,ceil(AVG(salary))
FROM salaries
GROUP BY emp_no;


-- 8.사원별 급여의 평균이 30.000~50,000인, 사원번호와 평균급여를 조회해주세요.

SELECT emp_no,ceil(avg(salary)) AS avg_sal
FROM salaries
GROUP BY emp_no HAVING avg_sal>=30000 AND avg_sal<=50000;

-- 9.사원별 급여 평균이 70,000이상인, 사원의 사번, 이름, 성,성별을 조회해 주세요.
SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no=sal.emp_no

	GROUP BY emp_no HAVING ceil(avg(salary))>=70000 ; 
	
	
-- 10.현재 직책이 "Senior Engineer"인,사원의 사원번호와 성을 조회해주세요.

SELECT emp.emp_no, emp.last_name, tit.title
FROM titles tit
	INNER JOIN employees emp
	ON emp.emp_no=tit.emp_no
	WHERE to_date>=NOW() 
	AND tit.title='senior engineer'; 
	
-- 1. 짝궁의 인적사항을 사원 테이블에 삽입해주세요.

INSERT INTO employees (
emp_no
,birth_date
,first_name
,last_name
,gender
,hire_date)
VALUES (
500003
,19920101
,'sana'
,'golyong'
,'F'
,20100101
);




-- 2. 1번에서 삽입한 짝궁의 월급을 삽입해주세요.
INSERT INTO salaries(
emp_no
,salary
,from_date
,to_date
)
VALUES (
500003
,1000000
,20100101
,99990101
);




-- 3. 이름이 'sachin'인 사람의 성별을 'F',생일을 1970-01-01로 변경해주세요.

UPDATE employees
SET gender='F',birth_date=19700101
WHERE first_name='sachin';


-- 4. 짝궁의 모든 정보를 삭제해주세요.

DELETE FROM employees
WHERE emp_no=500003;

DELETE FROM salaries
WHERE emp_no=500003;

CREATE DATABASE jangboja;

USE jangboja;

CREATE TABLE jang(
	id INT PRIMARY KEY AUTO_INCREMENT
	,item_name VARCHAR(50) NOT null
	,amount INT NOT null
	,d_day DATE NOT NULL  
	,finished CHAR(1) NOT NULL DEFAULT '0'
	,finished_at DATE 
	,tag_id VARCHAR(10) 
	,img VARCHAR(50)
	,memo VARCHAR(1000)
	,CONSTRAINT fk_jang_tag_id FOREIGN KEY(tag_id)
        REFERENCES tag_type(tag_id) ON DELETE CASCADE
	);	
	
CREATE TABLE tag_type(
	tag_id VARCHAR(10) PRIMARY KEY
	,tag_name INT(1)
	,tag_img VARCHAR(500)
	);


ALTER TABLE tag_type MODIFY COLUMN tag_name VARCHAR(500)
;
  
  INSERT INTO tag_type(
		tag_id, tag_name
  )
  VALUE(
  		0, null
  );
  
  INSERT INTO jang
  VALUE(
  		0, '맛있는 치킨', 4, '20231012', 0, NULL, 2, NULL, '맛있겠다'
  );
  COMMIT;
  FLUSH PRIVILEGES;
  
   SELECT 
		   id
		   ,item_name
		   ,amount
		   ,d_day
		   ,finished 
		   ,finished_at 
		  ,tag_id 
		  ,img 
		  ,memo 
		   FROM 
		   jang 
		   WHERE 
		id= 7 ;
		
		 select "
			j.id "
			.j.item_name "
		."	.j.amount "
		."	.j.d_day "
		."	.t.tag_img "
		." from "
		."	 jang j "
		." 	join "
		."	  tag_type t "
		."   on "
		."     j.tag_id = t.tag_id "
		." where "
		."     j.finished = 0 "
		." order by "
		."     j.d_day desc "
		."     .j.id desc "
		;