//material download 

    document.getElementById('ai1Btn').addEventListener('click', () => {
  const a = document.createElement('a');
  a.href = 'Introduction to AI & History.pdf'; 
  a.download = 'Introduction to AI & History.pdf'; 
  document.body.appendChild(a); 
  a.click();
  document.body.removeChild(a);
});


    const bars = document.querySelectorAll('.bar');
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(entry => {
        if(entry.isIntersecting){
          const el = entry.target; el.style.width = el.dataset.percent + '%';
          io.unobserve(el);
        }
      });
    }, { threshold: 0.4 });
    bars.forEach(b => io.observe(b));

    document.getElementById('contactForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = e.target.querySelector('button[type="submit"]');
      const original = btn.textContent;
      btn.textContent = 'Sending...';
      setTimeout(()=>{ btn.textContent = 'Sent ✓'; setTimeout(()=> btn.textContent = original, 1500); }, 800);
    });

    document.getElementById('year').textContent = new Date().getFullYear();

    if(window.matchMedia('(prefers-reduced-motion: reduce)').matches){
      document.querySelectorAll('*').forEach(el => el.style.scrollBehavior = 'auto');
    }

    