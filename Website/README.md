# Setup for website
In this section we will be explaining the setup for the website.
## Windows
For the usage of windows we would recommend using  [XAMPP](https://www.apachefriends.org/index.html) to run  the website
## Linux 

For the Linux we will need to install php Apache as well as mysql

## Requirements

Python 3.8  
>including nltk , gensim , numpy ,BeautifulSoup , bs4,html5lib

`sudo apt-get install Python3.8 `
`pip install -r requirements.txt`

>to install nltk

1 we need install to nltk
2. open cmd 
3. type "pip install nltk","pip install gensim","pip install gensim"
4. inside cmd type python 
5. in python type "import ntlk" , "nltk.download" . 
6. After a nltk downloader pop out , click "all" right under the identifier colum and click download button. after all item download all item should turn green.

MySQL

`sudo apt-get install mysql`

import the feedback file to the database.

## Docker

Docker protects you. In some case there might be file corruption or anything that can cause your host machine in trouble, we use docker to simulate the environment since it acts like a virtual environment.

Download docker from [here](https://www.docker.com/)

After installing docker , open cmd and type "docker run -p 8080:8080 -e "MB_KEY=key" machinebox/fakebox"
