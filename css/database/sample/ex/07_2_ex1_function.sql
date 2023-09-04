-- 1.데이터 타입 변환 함수
-- **둘다 같은 기능을 합니다.**
-- CAST(값 AS데이터 형시)
-- CONVERT(값,데이터형식)
SELECT cast(1234 AS CHAR(4));
SELECT CONVERT (1234, CHAR(4));

-- 2.제어 흐름 함수 
-- IF(수식, 참일때, 거짓일때) :수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT if(0=1,'참','거짓');

SELECT emp_no,if(e.gender='M','남자', '여자')AS gender
FROM employees e;

-- IFNULL(수식1,수식2): 수식1이 NULL이면 수식2를 반환하고,
-- 							수식1이 NULl이 아니면 수식1를 반환

SELECT IFNULL(NULL,'수식2');

-- NULLIF(수식1,수식2):수식1과 2가 같으면 NULL을 반환하고,
-- 						다르면 수식1을 반환합니다.

SELECT NULLIF (1,1);
SELECT NULLIF (1,2);

SELECT emp_no
		,title
		,to_date
		,NULLIF(to_date,99990101) AS to_date2
FROM titles
ORDER BY emp_no DESC;		 
