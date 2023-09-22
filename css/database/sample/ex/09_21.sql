SELECT id,title,create_at,count(id)
FROM boards
ORDER BY id DESC 
LIMIT 5 OFFSET 10;

FLUSH PRIVILEGES;
 