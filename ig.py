# API instagram V1
# Tham số id_ig bắt buộc là chuỗi số
import requests
class instagram():
    def __init__(self,cookies,id_ig,text) -> None:
        self.cookies = cookies
        self.id_post = id_ig
        self.text = text
        self.csrftoken=cookies.split('csrftoken=')[1].split(';')[0]
        self.headers = {
            'cookie': self.cookies,
            'origin': 'https://www.instagram.com',
            'user-agent': 'user-agent: Mozilla/5.0 (Linux; Android 12; SM-T225) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
            'x-csrftoken': self.csrftoken,
            'x-instagram-ajax': '1006569155',
        }
        self.data ={
            'comment_text': self.text,
            }
    def Follow(self,id_ig):
        response = requests.post(f'https://www.instagram.com/web/friendships/{id_ig}/follow/', headers=self.headers).text
        return response
    def Like(self,id_ig):
        response = requests.post(f'https://www.instagram.com/web/likes/{id_ig}/like/',headers=self.headers).text
        return response   
    def Comment(self,id_ig):
        response = requests.post(f'https://www.instagram.com/web/comments/{id_ig}/add/',headers=self.headers, data=self.data).text
        return response
    def Like_comment(self,id_ig):
        response = requests.post(f'https://www.instagram.com/web/comments/like/{id_ig}/',headers=self.headers).text
        return response

job = instagram(cookies,id_ig,text)
follow = job.Follow(id_ig)
like = job.Like(id_ig)
comment = job.Comment(id_ig)
like_cmt = job.Like_comment(id_ig)
