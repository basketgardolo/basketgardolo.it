const fs = require('fs')
let rawdata = fs.readFileSync('wp_posts.json');
let giocatori = JSON.parse(rawdata);
giocatori.forEach(g => {
    try {
        fs.mkdirSync('content/giocatori/' + g.post_title.toLowerCase().replace(/\s/, '-'))
        let file = `---
title: ${g.post_title}
ruolo: ${g.name}
numero: ${g.meta_value}
---`
        fs.writeFileSync('content/giocatori/' + g.post_title.toLowerCase().replace(/\s/, '-') + '/_index.md', file)
    } catch(e) {}
})