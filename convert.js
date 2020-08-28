// var TurnDownService = require('turndown')
// var fs = require('fs')
// var turnDownService = new TurnDownService()
// var markdown = turnDownService.turndown('<h2>Ciap</h2>')
// fs.readdirSync('content/news').forEach(f => {
//     var text = fs.readFileSync('content/news/' + f, 'utf8')
//     var start = text.indexOf('---', 3) + 4
//     var content = turnDownService.turndown(text.substring(start))
//     console.log(content)
//     console.log('\n\n')
//     text = text.substring(0, start) + content
//     fs.writeFileSync('content/news/' + f, text)
// })
// console.log(markdown)
var fs = require('fs')
fs.readdirSync('content/news').forEach(f => {
    var text = fs.readFileSync('content/news/' + f, 'utf8')
    var start = text.indexOf('---', 3)
    var newText = ''
    text.substring(0, start).split('\n').forEach(l => {
        if (l.startsWith('title') || l.startsWith('date') || l.startsWith('---')) {
            newText += l + '\n'
        }
    })
    console.log(newText)
    newText += text.substring(start)
    fs.writeFileSync('content/news/' + f, newText)
})