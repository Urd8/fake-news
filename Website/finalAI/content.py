from bs4 import BeautifulSoup
import urllib.request
import gzip
import io
import sys
def main(url):
    headers = {'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
               'Accept-Encoding': 'gzip, deflate',
               'Accept-Language': 'en-US,en;q=0.5',
               'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0'}


    req = urllib.request.Request(url, headers=headers)
    response = urllib.request.urlopen(req)

    if response.info().get('Content-Encoding') == 'gzip':
        pagedata = gzip.decompress(response.read())
    elif response.info().get('Content-Encoding') == 'deflate':
        pagedata = response.read()
    elif response.info().get('Content-Encoding'):
        print('Encoding type unknown')
    else:
        pagedata = response.read()

    soup = BeautifulSoup(pagedata,'html5lib')
    contents = soup.find_all('p')   
    print(len(contents))
    for x in contents:
        print(x.get_text())
if __name__=='__main__':
    main(sys.argv[1])
