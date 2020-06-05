document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('button').addEventListener('click', onclick, false)
    
    function onclick () {
      chrome.tabs.query({currentWindow: true, active: true}, function (tabs) {
        chrome.tabs.sendMessage(tabs[0].id, 'hi', setData)
      })
    }
    
    function setData (res) {
      const div = document.createElement('div')
      decision=`The content is ${res.content_decision}`
      score=`It is Scored at ${res.content_score * 100} %`
      keywords =`The keywords found were ${res.keyword_1},${res.keyword_2},${res.keyword_3},${res.keyword_4}`
      document.getElementById("Decision").innerHTML = decision
      document.getElementById("Score").innerHTML = score
      document.getElementById("Keywords").innerHTML = keywords
      // div.textContent = `The content is ${res.content_decision} with a score of ${res.content_score} \n \br
      // The keywords found were ${res.keyword_1},${res.keyword_2},${res.keyword_3},${res.keyword_4}`
      // document.body.appendChild(div)
    }
  }, false)