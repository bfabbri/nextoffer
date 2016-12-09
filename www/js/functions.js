// Function to create alert without the page title
function falert(message){
  if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|IEMobile)/)){
    var iframe = document.createElement("IFRAME")
    iframe.setAttribute("src", 'data:text/plain,')
    iframe.setAttribute("height", 0)
    iframe.setAttribute("width", 0)
    iframe.setAttribute("class", 'iframe')
    document.documentElement.appendChild(iframe)
    $('.iframe').hide()
    // element = document.getElementsByClassName('iframe')
    window.frames[0].window.alert(message)
    // element.remove()
    iframe.parentNode.removeChild(iframe)
  } else {
    alert(message)
  }
}