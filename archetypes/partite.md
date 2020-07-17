---
title: "{{ replace .Name "-" " - " | title }}"
date: {{ .Date }}
draft: true
squadra-a: ""
punteggio-a: 0
squadra-b: ""
punteggio-b: 0
luogo: ""
categoria: ""
stagione: {{ if ge now.Month 7 }} {{ now.Year }}-{{ (now.AddDate 1 0 0).Year }} {{ else }} {{ (now.AddDate -1 0 0).Year }}-{{ now.Year }} {{ end }}
---