
## hackers-refactoring-laravel

### 기획의도 
본 프로젝트를 진행하게 된 이유는 라라벨 프레임워크를 사용해서 개발을 해봄으로써 프레임워크 사용의 익숙함을 길러보자는 의도로 진행하였다.

### 리팩토링  
기존에 진행했던 해커스 어학원 과제 (https://github.com/parkjunga/hackers) 를 프레임워크를 사용해서 개발하였다.
jquery -> javascript es6 를 사용해서 좀 더 성능적으로도 나은 사이를 만들어 보고자하였다. 

제공하는 기능은 
- 회원가입
- 로그인 
- 아이디찾기 (이메일 찾기)
- 게시판 CRUD

## 아쉬운점
DB 모델링을 새로하지는 않아 DB 테이블간에 설계측면이 아쉽다. 또한 라라벨에 대해 완벽한 이해를 위해서는 라라벨에서 제공하는 API에 대해서도 조금 더 공부할 필요할 것으로 보인다.
또한 비즈니스 로직 분리가 크게 되지 않아 그 부분에 대해서도 리팩토링이 필요할 것으로 보인다. 
