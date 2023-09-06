CREATE TABLE members(
	mem_no INT PRIMARY KEY auto_increment
	,id VARCHAR(30) UNIQUE NOT NULL 
	,mem_name VARCHAR(30) NOT NULL 
	,addr VARCHAR(100) NOT null
);

CREATE TABLE points (
	mem_no INT PRIMARY KEY
	,pt INT NOT NULL DEFAULT(0)
	,CONSTRAINT fk_points_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE 
);	

CREATE TABLE order_list(
	order_n INT PRIMARY KEY
	,mem_no INT NOT NULL
	,CONSTRAINT fk_order_list_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE
	,goods_no INT NOT NULL
	,CONSTRAINT fk_order_list_goods_no FOREIGN KEY(goods_no)
		REFERENCES goodslist(goods_no) ON DELETE NO ACTION 
	,quantity INT NOT NULL 
	,pay INT NOT NULL 	 
);
	
CREATE TABLE goodslist(
	goods_no INT PRIMARY KEY
	,goods_name VARCHAR(50) NOT null
	,goods_p	INT NOT null
);

INSERT INTO members( id,mem_name,addr)
VALUES('admin','meerkat','koreadaegu');

INSERT INTO points(mem_no)
VALUES(1);

ALTER TABLE members ADD COLUMN age INT NOT NULL;
ALTER TABLE members MODIFY COLUMN mem_name VARCHAR(50) NOT NULL ;
ALTER TABLE members DROP COLUMN age;


SELECT emp.emp_no,emp.last_name
FROM employees AS emp
INNER JOIN titles AS tit
ON emp.emp_no=tit.emp_no
WHERE tit.to_date>=NOW() AND tit.title='senior Engineer'