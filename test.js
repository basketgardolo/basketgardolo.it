const fs = require('fs')
const unserialize = require('php-unserialize')

let rawdata = fs.readFileSync('a.json');
let partite = JSON.parse(rawdata);
partite.forEach(p => {
    try {
    let risultati = unserialize.unserialize(p.risultati)
    let points = []
    if (risultati) {
        Object.keys(risultati).forEach(k => {
            points.push(risultati[k].points)
        })
    } else {
        points = [0,0]
    }
    let squadre = ['', '']
    if (p.squadre) {
        squadre = p.squadre.split(',')
    }

    let file = `---
title: ${p.partita}
date: ${p.date}
squadra-a: ${squadre[0]}
punteggio-a: ${points[0]}
squadra-b: ${squadre[1]}
punteggio-b: ${points[1]}
partite/squadra: ${p.campionato.toLowerCase().replace(/\s/gi, '-')}-${p.stagione.substr(2,2)}-${p.stagione.substr(7,2)}
luogo: ${p.campo}
categoria: ${p.campionato.toLowerCase()}
---
${p.testo ? p.testo : ''}`
        fs.writeFileSync(`content/partite/${p.permalink}.md`, file)
    } catch (e) {
        console.log(p, e)
    }
})
// fs.writeFileSync('content/partite/test.md', file)

// giocatori.forEach(g => {
//     try {
//         fs.mkdirSync('content/giocatori/' + g.post_title.toLowerCase().replace(/\s/, '-'))
//         let file = `---
// title: ${g.post_title}
// ruolo: ${g.name}
// numero: ${g.meta_value}
// ---`
//         fs.writeFileSync('content/giocatori/' + g.post_title.toLowerCase().replace(/\s/, '-') + '/_index.md', file)
//     } catch(e) {}
// })