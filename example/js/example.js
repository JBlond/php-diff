function changeCSS(cssFile, cssLinkIndex)
{

    const oldLink = document.getElementsByTagName('link').item(cssLinkIndex)

    const newLink = document.createElement('link')
    newLink.setAttribute('rel', 'stylesheet')
    newLink.setAttribute('type', 'text/css')
    newLink.setAttribute('href', cssFile)

    document.getElementsByTagName('head').
        item(0).
        replaceChild(newLink, oldLink)
}

const collapsible = {
    init: function () {
        const elements = document.getElementsByClassName('collapsible')
        for (let i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', this.handleEvent)
        }
    },
    handleEvent: function () {
        const elements = this.parentElement.children
        for (let i = 0; i < elements.length; ++i) {
            elements[i].classList.toggle('closed')
        }
    },
}

docReady(function () {
    collapsible.init()
})
