function updateCurrentLink() {
  const path = location.pathname;
  document.querySelectorAll('aside a').forEach(a => {
    a.classList.toggle('current', a.getAttribute('href') === path);
  });
}

ACCELA.initPage = function(){
  document.querySelector("body").classList.add("show");
};

ACCELA.movePage = function(pageContent, move){
  move();
};

ACCELA.changePageContent = function(body, pageContent){
  const currentMain = body.querySelector("main");
  const newMain = pageContent.querySelector("main");

  if(currentMain && newMain){
    currentMain.replaceWith(newMain);
  }else{
    body.innerHTML = "";
    body.appendChild(pageContent);
  }
  updateCurrentLink();
};


// Load marked.js
import('https://cdn.jsdelivr.net/npm/marked@11/lib/marked.esm.js').then((module) => {
  window.marked = module.marked;
});

// Load mermaid.js
import('https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs').then((module) => {
  window.mermaid = module.default;
  window.mermaid.initialize({ startOnLoad: false });
});

// Markdown module
ACCELA.modules.markdown = async (div) => {
  const urlPath = div.getAttribute("data-url-path");
  if(!urlPath) return;

  while (!window.marked || !window.mermaid) {
    await new Promise(resolve => setTimeout(resolve, 10));
  }

  try {
    let apiPath;

    if (urlPath.endsWith('/')) {
      apiPath = `/api/md${urlPath}index.json`;
    } else {
      apiPath = `/api/md${urlPath}.json`;
    }

    const response = await fetch(apiPath);
    if (!response.ok) {
      div.innerHTML = '<p>Failed to load content</p>';
      return;
    }

    const data = await response.json();
    div.innerHTML = marked.parse(data.markdown);

    // Render Mermaid diagrams
    const mermaidBlocks = div.querySelectorAll('code.language-mermaid');
    mermaidBlocks.forEach(async (block, index) => {
      const mermaidCode = block.textContent;
      const mermaidId = `mermaid-diagram-${index}`;
      const container = document.createElement('div');
      container.className = 'mermaid';

      block.parentElement.replaceWith(container);

      try {
        const { svg } = await window.mermaid.render(mermaidId, mermaidCode);
        container.innerHTML = svg;
      } catch (error) {
        console.error('Mermaid render error:', error);
        container.innerHTML = `<pre>Mermaid Error: ${error.message}\n\nCode:\n${mermaidCode}</pre>`;
      }
    });

    // patch: external links
    div.querySelectorAll("a").forEach(a => {
      if (a.hostname && a.hostname !== window.location.hostname) {
        a.target = "_blank";
      }
    });

  } catch (error) {
    div.innerHTML = '<p>Error loading content</p>';
    console.error('Failed to fetch markdown:', error);
  }
};
