
//to fetch the current paragraphs data on the webpage


var paragraphs = document.getElementsByTagName("p");
var lol = [];
var x = "";
for (var i = 0; i < paragraphs.length; i++) {
  var x = x.concat(paragraphs[i].textContent)
  lol.push(paragraphs[i].textContent)
}
//console.log(x)

//This function check the data with the api running on the cloud
var xhr = new XMLHttpRequest();
var url = "https://fake-news-277811.df.r.appspot.com/fakebox/check";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var json = JSON.parse(xhr.responseText);
        //console.log("test");
        //console.log(json.domain.category + ", " + json.title.decision+", "+json.content.decision);
        //json.domain.category
        contentdecision = json.content.decision;
        contentscore = json.content.score;
        urlanswer = json.domain.category;
        keyword1 = json.content.keywords[0].keyword;
        keyword2 = json.content.keywords[1].keyword;
        keyword3 = json.content.keywords[2].keyword;
        keyword4 = json.content.keywords[3].keyword;
        
    }
};
var data = JSON.stringify({"url": "hey@mail.com", "title": "101010","content":x});
xhr.send(data);

chrome.runtime.onMessage.addListener(function (request, sender, sendResponse) {

//to send the data to output on popup.html
sendResponse({content_decision:contentdecision,content_score:contentscore,keyword_1:keyword1,keyword_2:keyword2,keyword_3:keyword3,keyword_4:keyword4});
//console.log(urlanswer);
console.log(keyword1);
})
