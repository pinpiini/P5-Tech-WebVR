/* global AFRAME */
AFRAME.registerComponent('info-panel', {
    init: function () {
      var buttonEls = document.querySelectorAll('.menu-button');
      var fadeBackgroundEl = this.fadeBackgroundEl = document.querySelector('#fadeBackground');
  
      this.movieTitleEl = document.querySelector('#movieTitle');
      this.movieDescriptionEl = document.querySelector('#movieDescription');
  
      this.movieInfo = {
        karigurashiButton: {
          title: 'Mengapa Siswa Gagal (2010)',
          imgEl: document.querySelector('#card1'),
          description: 'Banyak siswa di sekolah mengalami kegagalan. Mereka gagal mengembangkan kemampuan mereka untuk belajar, memahami, serta menciptakan, yang sudah dikaruniakan kepada mereka sejak lahir, dan yang sebetulnya sudah sangat baik mereka kembangkan dalam tahun-tahun pertama kehidupan mereka.'
        },
        kazetachinuButton: {
          title: 'Cerita Spesial Doraemon: Canda',
          imgEl: document.querySelector('#card2'),
          description: 'Komik Cerita Spesial Doraemon: Canda karya Fujiko F. Fujio menjadi salah satu komik yang wajib untuk diikuti. Komik ini memiliki konsep cerita cukup unik dan mengesankan sehingga berbeda dari komik lainnya. Nobita panik, karena dirinya tidak mempunyai keahlian yang bisa dipentaskan di acara perpisahan. Padahal dalam acara perpisahan itu, setiap anak harus membuat sebuah atraksi. Berkat ide aneh Doraemon, Nobita tampil bermusik kentut. Doraemon selalu punya cerita menarik. Komik best seller. Yuk, mulai ikuti dan simak serial komik ini!'
        },
        ponyoButton: {
          title: 'SBY Selalu Ada Pilihan (2016)',
          imgEl: document.querySelector('#card3'),
          description: 'Sebagai Presiden yang memimpin di era transisi dan era politik gaduh ini, tentu tak sedikit pula permasalahan dan tantangan yang dihadapinya. Di penghujung masa kepresidenannya, SBY menulis sendiri pengalaman dan suka-dukanya selama memimpin negeri ini.'
          
        }
      };
  
      this.onMenuButtonClick = this.onMenuButtonClick.bind(this);
      this.onBackgroundClick = this.onBackgroundClick.bind(this);
      this.backgroundEl = document.querySelector('#background');
      for (var i = 0; i < buttonEls.length; ++i) {
        buttonEls[i].addEventListener('click', this.onMenuButtonClick);
      }
      this.backgroundEl.addEventListener('click', this.onBackgroundClick);
      this.el.object3D.renderOrder = 9999999;
      this.el.object3D.depthTest = false;
      fadeBackgroundEl.object3D.renderOrder = 9;
      fadeBackgroundEl.getObject3D('mesh').material.depthTest = false;
    },
  
    onMenuButtonClick: function (evt) {
      var movieInfo = this.movieInfo[evt.currentTarget.id];
  
      this.backgroundEl.object3D.scale.set(1, 1, 1);
  
      this.el.object3D.scale.set(1, 1, 1);
      if (AFRAME.utils.device.isMobile()) { this.el.object3D.scale.set(1.4, 1.4, 1.4); }
      this.el.object3D.visible = true;
      this.fadeBackgroundEl.object3D.visible = true;
  
      if (this.movieImageEl) { this.movieImageEl.object3D.visible = false; }
      this.movieImageEl = movieInfo.imgEl;
      this.movieImageEl.object3D.visible = true;
  
      this.movieTitleEl.setAttribute('text', 'value', movieInfo.title);
      this.movieDescriptionEl.setAttribute('text', 'value', movieInfo.description);
    },
  
    onBackgroundClick: function (evt) {
      this.backgroundEl.object3D.scale.set(0.001, 0.001, 0.001);
      this.el.object3D.scale.set(0.001, 0.001, 0.001);
      this.el.object3D.visible = false;
      this.fadeBackgroundEl.object3D.visible = false;
    }
  });