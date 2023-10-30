// HTTP (Hypertext Transfer Protocol)란?
	// 어떻게 Hypertext 를 주고 받을지 규약한 프로토콜로
	// 클라이언트가 서버에 데이터를 request(요청)을 하고,
	// 서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.Hypertext
	// Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스,문서,이미지 등을 모두 포함합니다.

	// AJAX (Asynchronous JavaScript And XML)이란?
	// 웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고,,
	// 서버의 response를 받아 동작으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
	// 즉 웹페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
	// 대표적으로 XMLHttpRequest방식과 Fetch Api방식이 있습니다.


	// JSON(JavaScript Object Notation)이란
	// JavaScript의 Object에 큰영감을 받아 만들어진 서버간의 HPPT 통신을 위한 텍스트 데이터 포맷입니다.
	// 장점은 다음과 같습니다.같습니다
	// -데이터를 주고 받을때 쓸수 있는 가장 간단한 파일 포맷
	// -가벼운 텍스트를 기반
	// -가독성이 좋음
	// -key와 value가 짝을 이루고 있음
	// -데이터를 서버와 주고 받을때 직렬화(Serialization)하기 위해 사용
	// -프로그래밍 언어나 플랫폼에 상관없이 사용가능
	// XML
	// <xml>
	// 		<data>	
	// 			<id>56</id>
	// 			<name>홍길동</name>
	// 
	// 
	// 		</data>
	// </xml>

	// json
	// {
	// 		data:{
	//			id:56
	//			,name: '홍길동'
	// 		}
	// }