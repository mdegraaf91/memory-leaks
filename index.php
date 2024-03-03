<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lightning talk</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="logo logo--align-right">
        <img src="assets/images/logo-outline.svg" />
    </div>

        <div class="container">
            <main>
                <h1>Memory leaks in Javascript</h1>
                <ol>
                    <li data-step="1">Wat is een memory leak?</li>
                    <li data-step="2">Hoe <strong>ontstaat</strong> een memory leak en hoe <strong>voorkom</strong> je dit?</li>
                    <li data-step="3">Hoe kun je een memory leak <strong>meten</strong>?</li>
                    <li data-step="4">Conclusie</li>
                </ol>
            </main>
            <div class="steps">
                <div class="step" data-step="1">
                    <p>Een memory leak is een situatie waarin objecten en variablen nog steeds geheugen in gebruik nemen over tijd terwijl dat niet meer nodig is. Dit vertraagt je applicatie en kan zelfs je browser laten crashen.</p> 
                    <p>Nu zit er in javascript een process dat automatisch geheugen vrijmaakt genaamd: Garbage collection, wat is garbage collection?</p>
                    <ul>
                        <li>In javascript, elke keer dat er een variable of object wordt aangemaakt gebruikt dit geheugen, en als hier niet zorgvuldig mee wordt omgegaan kan het gebruik in geheugen aardig snel opstapelen en een memory leak veroorzaken.</li>
                        <li>Dit is waar de garbage collection komt kijken, garbage collection maakt automatisch geheugen vrij door te kijken welke objecten er geheugen gebruiken maar deze niet meer nodig hebben binnen je applicatie.</li>
                        <li>De garbage collection voorkomt dus memory leaks tot op zekere hoogte, maar er zijn situaties waar een memory leak nog steeds kan voorkomen.</li>
                    </ul>
                </div>
                <div class="step" data-step="2">
                    <p>Hieronder een paar voorbeelden waarin een memory leak kan voorkomen:</p> 
                    <ol>
                        <li>
                            <details>
                                <summary><h3>Global variables</h3></summary>
                            <p>Global variables in javascript kunnen makkelijk een memory leak veroorzaken als deze niet op de juiste manier worden opgeschoond. Hier is een veel voorkomend voorbeeld:</p>
                            <img src="assets/images/global-var-01.png" class="code-block" />
                            <pre>globalVar</pre><span> is global en behoud zijn data, zelfs wanneer deze niet meer nodig is waardoor er een memory leak wordt veroorzaakt.</span>
                            <hr>
                            <p>In plaats daarvan kunnen we een local variable gebruiken binnen een functie.</p>
                            <img src="assets/images/global-var-02.png" class="code-block" />
                            <p><pre>localVar</pre> bestaat alleen wanneer <pre>myFunction()</pre> in gebruik is, dus wanneer de functie zijn taak heeft uitgevoerd stopt in dit geval ook de <pre>expensiveComputation()</pre>, dit helpt met het voorkomen van een memory leak.</p>
                            </details>
                        </li>
                        <li>
                            <details>
                                <summary><h3>Timers</h3></summary>
                                <p>Wanneer er gebruik wordt gemaakt van timer functies: <pre>setTimeout()</pre> en <pre>setInterval()</pre>, is het belangrijk deze ook weer te clearen wanneer ze niet worden gebruikt.</p>
                                <img src="assets/images/timer-01.png" class="code-block" />
                                <img src="assets/images/timer-02.png" class="code-block" />
                            </details>
                        </li>
                        <li>
                            <details>
                                <summary><h3>Event listeners</h3></summary>
                                <p>Wanneer er gebruikt gemaakt wordt van eventListeners en vervolgens bestaat het element zelf niet meer blijft de eventListener nog wel actief in geheugen wat een memory leak veroorzaakt.</p>
                                <img src="assets/images/event-01.png" class="code-block" />
                                <img src="assets/images/event-02.png" class="code-block" />
                            </details>
                        </li>
                    </ol>
                </div>
                <div class="step" data-step="3">
                    <p>In de DEVtools van je browser kun je onder de tabs <br/> <strong>Performance</strong> en <strong>Memory</strong> meten hoeveel geheugen er in gebruik wordt genomen door je applicatie en kan je hints geven of er sprake is van een memory leak.</p>
                    <h3><strong>Demo</strong></h3>
                    <div class="buttons">
                        <a href="/performance-tab.php" target="_blank" class="button">Performance tab</a>
                        <a href="/memory-tab.php" target="_blank" class="button">Memory tab</a>
                    </div>
                </div>
                <div class="step" data-step="4">
                    <ul>
                        <li>Bij single page applications kunnen memory leaks sneller ontstaan dan bij een multi page application, bij een multi-page application wordt bij elke pagina bezoek de pagina opnieuw gerenderd en wordt hierdoor ook de javascript opnieuw ingeladen.</li>
                        <li>Moderne browsers zoals Chrome en Firefox hebben geavanceerde garbage collection processen dus grotendeels wordt dit automatisch afgevangen.</li>
                        <li>Het kan nog steeds voorkomen dus het helpt om te weten wanneer je de garbage collector in de weg zit, vooral wanneer de applicatie groeit.</li>
                        <li>Gebruik je browser DEVTools om je applicatie te meten op memory leaks om performance te winnen en de kans op freezes en browser crashes te verminderen, dit creeert een betere gebruikerservaring.</li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="assets/js/index.js" type="module"></script>
  </body>
</html>
