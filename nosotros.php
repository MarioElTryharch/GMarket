<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="mask-icon" href="img/logo.png" color="#color-hex">
    <link rel="apple-touch-icon" href="img/logo.png">
    <title>Sobre Nosotros - GlobalMarket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a3093 0%, #a044ff 100%);
            color: #333;
            line-height: 1.6;
            animation: slideIn 1s ease-out forwards;
  transform: translateY(20px);
  opacity: 0;
  }
  @keyframes slideIn {
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
        
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }
  
  a {
    color: #000000;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  .header {
    background: #ff0;
    padding: 15px 0;
    font-size: 20px;
    font-weight: 900; 
  }
  
  .header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .header .logo {
    font-size: 28px;
    color: #4a148c;
    font-weight: bold;
   
  }
  
  .nav a {
    margin: 0 15px;
    text-decoration: none;
    color: #4a148c;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  
  .nav a:hover {
    color: #000000;
    transform: translateY(-2px)
  }
  .nav a {
    display: inline-block;
    transition: transform 0.3s ease;
  }
  
  .nav .btn-cart {
    background: #4a148c;
    color: #fff;
    font-size: 20px;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    transition: background 0.3s ease;
  }
  
  .nav .btn-cart:hover {
    background: rgb(0, 0, 0);
    transform: scale(1.05);
    
    
  }
  
  [logo-animated] {
    display: inline-block;
    perspective: 1000px;
  }
  
  [logo-animated] img.footer-logo {
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  }
  
  [logo-animated] img.footer-logo:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    filter: brightness(1.05); /* Ligero aumento de brillo */
  }
        
        .about-header {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(rgba(106, 48, 147, 0.1), rgba(106, 48, 147, 0.05));
        }
        
        .about-header h1 {
            color: #6a3093;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .about-header p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            color: #555;
        }
        
        .about-content {
            display: flex;
            flex-wrap: wrap;
            padding: 30px;
        }
        
        .about-section {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .about-section h2 {
            color: #6a3093;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffc107;
            display: inline-block;
        }
        
        .mission-vision {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin: 30px 0;
        }
        
        .mission-card, .vision-card {
            flex: 1;
            min-width: 300px;
            background: #f9f9f9;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-top: 5px solid;
        }
        
        .mission-card {
            border-color: #6a3093;
        }
        
        .vision-card {
            border-color: #ffc107;
        }
        
        .mission-card h3, .vision-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .mission-card h3 {
            color: #6a3093;
        }
        
        .vision-card h3 {
            color: #ffab00;
        }
        
        .mission-card h3::before {
            content: "🎯";
            margin-right: 10px;
        }
        
        .vision-card h3::before {
            content: "🔮";
            margin-right: 10px;
        }
        
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        
        .team-member {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            width: 280px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .team-member:hover {
            transform: translateY(-5px);
        }
        
        .team-member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ffc107;
            margin-bottom: 15px;
        }
        
        .team-member h3 {
            color: #6a3093;
            margin-bottom: 5px;
        }
        
        .team-member p.position {
            color: #ffab00;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .values-list {
            list-style-type: none;
        }
        
        .values-list li {
            background: #f0e6ff;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid #ffc107;
            border-radius: 0 5px 5px 0;
        }
        
        .values-list li strong {
            color: #6a3093;
        }
        
        .stats {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
            margin-top: 30px;
        }
        
        .stat-item {
            text-align: center;
            min-width: 150px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #6a3093;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #555;
            font-size: 0.9rem;
        }
        
        .cta-section {
            background: linear-gradient(to right, #6a3093, #a044ff);
            color: white;
            text-align: center;
            padding: 50px 20px;
            border-radius: 0 0 15px 15px;
        }
        
        .cta-section h2 {
            margin-bottom: 20px;
            font-size: 2rem;
        }
        
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background: #ffc107;
            color: #6a3093;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .cta-button:hover {
            background: #ffd700;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        footer {
    background-color: #ff0; 
    color: #000;
    padding: 20px;
    text-align: center;
  }
  footer {
    background-color: #ff0; 
    color: #000;
    padding: 20px;
    text-align: center;
  }
  
  .footer-content {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    margin-bottom: 20px;
  }
  
  .footer-logo {
    max-width: 100px; 
    margin-right: 20px;
    border-radius: 100%;
  }
  
  .footer-info, .footer-links {
    text-align: left;
    line-height: 2.0;
    
  }
  
  .footer-links a {
    display: block;
    margin-bottom: 5px;
    color: #000;
    text-decoration: none;
  }
  
  .footer-bottom {
    border-top: 1px solid #000;
    padding-top: 10px;
  }
 

  .mission-vision p{
    text-align: center;
  }
  .about-section p{
    text-align: center;
  }
    </style>
</head>
<body>
    
<?php include 'navbar2.php'; ?>

    <div class="about-container">
        
        <div class="about-header">
            <h1>Sobre Nosotros</h1>
            <p>GlobalMarket es una empresa innovadora dedicada a brindar soluciones excepcionales a nuestros clientes desde 2010. Nuestra pasión por la excelencia nos ha convertido en líderes del sector.</p>
        </div>
        
        <div class="about-content">
            <div class="about-section">
                <h2>Nuestra Historia</h2>
                <p>La Historia de GlobalMarket: De un Sueño a Realidad

                    En 2012, cuatro jóvenes venezolanos —Samir, Hugo, Jeannerys y Mario— unieron sus ahorros para abrir un pequeño local en Cabimas, Zulia. Con solo un mostrador y estantes medio vacíos, empezaron vendiendo productos básicos, pero con una gran visión: llevar calidad y servicio excepcional a cada hogar.
                    
                    Los Inicios
                    Trabajaban día y noche, atendiendo personalmente, manejando inventario y hasta repartiendo pedidos en moto. Su dedicación los hizo ganarse la confianza de la comunidad.
                    
                    El Cambio Digital
                    En 2015, lanzaron su primera tienda online, una página sencilla pero revolucionaria para la época. Esto les permitió expandirse a Maracaibo y luego a otras ciudades de Venezuela.
                    
                    Expansión Internacional
                    Para 2020, con una plataforma robusta y alianzas logísticas, llegaron a Venezuela y Colombia. Hoy están en 8 países, con más de 1,000 empleados y un catálogo que incluye desde alimentos hasta tecnología.
                    
                    "Empezamos con un sueño y mucho esfuerzo. Ahora, cada día es una nueva oportunidad para crecer y servir mejor" — Samir, Co-fundador.
                    
                     </p>
                
                
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">12+</div>
                        <div class="stat-label">Años de experiencia</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">150+</div>
                        <div class="stat-label">Clientes satisfechos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">40+</div>
                        <div class="stat-label">Empleados</div>
                    </div>
                </div>
            </div>
            
            <div class="about-section">
                <h2>Misión y Visión</h2>
                <div class="mission-vision">
                    <div class="mission-card">
                        <h3>Nuestra Misión</h3>
                        <p>En GlobalMarket, nos dedicamos a crear un impacto transformador en el negocio de nuestros clientes a través del desarrollo y provisión de productos tecnológicos de excelencia y soluciones integrales diseñadas para las demandas del mundo digital actual. Nuestro compromiso fundamental es facilitar herramientas tecnológicas robustas, innovadoras y escalables que no solo resuelvan los desafíos inmediatos de nuestros clientes, sino que anticipen sus necesidades futuras, permitiéndoles mantener una ventaja competitiva sostenible en sus respectivos mercados.</p>
                    </div>
                    <div class="vision-card">
                        <h3>Nuestra Visión</h3>
                        <p>Ser líderes en la provisión de productos y servicios tecnológicos de alta calidad, diseñados para impulsar la eficiencia, competitividad y crecimiento sostenible de nuestros clientes. A través de soluciones innovadoras y un servicio excepcional, nos comprometemos a superar expectativas, generando confianza y valor en cada interacción. Guiados por la integridad, excelencia y mejora continua, aspiramos a ser el partner estratégico preferido en la industria, contribuyendo a un futuro donde la tecnología y el compromiso humano marquen la diferencia.</p>
                    </div>
                </div>
            </div>
            
            <div class="about-section">
                <h2>Nuestro Equipo</h2>
                <div class="team-members">
                    <div class="team-member">
                        <img src="img/p2.png" alt="Jeannerys Moreno">
                        <h3>Jeannerys Moreno</h3>
                        <p class="position">CEO & Fundadora</p>
                        <p>Con más de 3 años de experiencia en el sector, María lidera nuestra visión estratégica.</p>
                    </div>
                    <div class="team-member">
                        <img src="img/p1.png" alt="Mario Ramos">
                        <h3>Mario Ramos</h3>
                        <p class="position">Director de Tecnología</p>
                        <p>Experto en innovación tecnológica y desarrollo de productos.</p>
                    </div>
                    <div class="team-member">
                        <img src="img/p4.png" alt="Samir Danoun">
                        <h3>Samir Danoun</h3>
                        <p class="position">Director de Distribucion</p>
                        <p>Experto en comercioalización y distribución de productos.</p>
                    </div>
                    <div class="team-member">
                        <img src="img/p3.png" alt="Hugo Contrerasa">
                        <h3>Hugo Contreras</h3>
                        <p class="position">Director de Marketing</p>
                        <p>Experto en crear estrategias de marketing</p>
                    </div>
                </div>
            </div>
                   
            <div class="about-section">
                <h2>Nuestros Valores</h2>
                <ul class="values-list">
                    <li><strong>Innovación:</strong> Buscamos constantemente nuevas formas de superar expectativas.</li>
                    <li><strong>Integridad:</strong> Hacemos negocios con transparencia y honestidad.</li>
                    <li><strong>Excelencia:</strong> Nos esforzamos por la perfección en cada detalle.</li>
                    <li><strong>Pasión:</strong> Amamos lo que hacemos y eso se refleja en nuestro trabajo.</li>
                    <li><strong>Trabajo en equipo:</strong> Creemos que juntos logramos más.</li>
                </ul>
            </div>
        </div>
        
        <div class="cta-section">
            <h2>¿Listo para comenzar con nosotros?</h2>
            <p>Descubre cómo GlobalMarket puede ayudarte a alcanzar tus objetivos.</p>
            <a href="contacto.html" class="cta-button">Contáctanos</a>
        </div>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>