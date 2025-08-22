const questions = [
  {
    question: "आउटबाउंड सेल्स कॉल का मुख्य उद्देश्य क्या है?",
    options: [
      "A. जानकारी एकत्र करना",
      "B. बिक्री करना",
      "C. ग्राहक सहायता प्रदान करना",
      "D. पिछले कॉल का फॉलो अप करना",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "संभावित ग्राहकों से आपत्तियों को संभालने का प्रभावी तरीका कौन सा है?",
    options: [
      "A. आपत्ति को नजरअंदाज करना",
      "B. ग्राहक के साथ बहस करना",
      "C. सुनना और समाधान प्रदान करना",
      "D. कॉल समाप्त करना",
    ],
    correctAnswer: 2,
  },
  {
    question: "सेल्स कॉल के दौरान सबसे महत्वपूर्ण जानकारी कौन सी है?",
    options: [
      "A. ग्राहक का पसंदीदा रंग",
      "B. ग्राहक का बजट और आवश्यकताएं",
      "C. ग्राहक के शौक",
      "D. ग्राहक की पिछली खरीदारी",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "यदि कोई संभावित ग्राहक आपके उत्पाद में रुचि नहीं रखता है तो आपको कैसे संभालना चाहिए?",
    options: [
      "A. लाभों पर जोर देना",
      "B. सम्मानपूर्वक कॉल समाप्त करना",
      "C. उनकी अरुचि को नजरअंदाज करना",
      "D. तुरंत छूट की पेशकश करना",
    ],
    correctAnswer: 1,
  },
  {
    question: "बिक्री बंद करने के लिए कौन सी तकनीक सबसे अच्छी है?",
    options: [
      "A. उत्पाद के बारे में अस्पष्ट रहना",
      "B. तत्कालता बनाना",
      "C. कीमत पर चर्चा से बचना",
      "D. फीचर्स के बारे में बात करते रहना",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप सेल्स कॉल के दौरान यह कैसे सुनिश्चित कर सकते हैं कि आप निर्णय लेने वाले से बात कर रहे हैं?",
    options: [
      "A. सीधे पूछें कि क्या वे निर्णय लेने वाले हैं",
      "B. मान लें कि हर कोई निर्णय लेने वाला है",
      "C. व्यक्तिगत सवाल पूछने से बचें",
      "D. केवल पहले संपर्क से बात करें",
    ],
    correctAnswer: 0,
  },
  {
    question: "सेल्स कॉल के बाद फॉलो अप करने का सबसे प्रभावी तरीका क्या है?",
    options: [
      "A. एक सामान्य ईमेल भेजें",
      "B. उनके संपर्क करने का इंतजार करें",
      "C. उन्हें तुरंत वापस कॉल करें",
      "D. व्यक्तिगत फॉलो अप ईमेल भेजें",
    ],
    correctAnswer: 3,
  },
  {
    question: "फोन पर संभावित ग्राहक के साथ संबंध कैसे बनाएं?",
    options: [
      "A. अपने बारे में बात करें",
      "B. सक्रिय रूप से सुनें और सहानुभूति दिखाएं",
      "C. कॉल को जल्दबाजी में निपटाएं",
      "D. छोटी बात से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "संभावित लीड की रुचि का प्रमुख संकेतक कौन सा है?",
    options: [
      "A. कीमत के बारे में पूछना",
      "B. प्रतिस्पर्धियों का उल्लेख करना",
      "C. उत्पाद के बारे में विस्तृत प्रश्न पूछना",
      "D. चुप रहना",
    ],
    correctAnswer: 2,
  },
  {
    question:
      "यदि कोई संभावित ग्राहक अधिक जानकारी का अनुरोध करता है तो आपको क्या करना चाहिए?",
    options: [
      "A. इसे प्रदान करने से इनकार करें",
      "B. उन्हें तुरंत एक ब्रॉशर भेजें",
      "C. एक और कॉल शेड्यूल करें",
      "D. अनुरोध को नजरअंदाज करें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप सेल्स प्रक्रिया में सीआरएम टूल्स का प्रभावी ढंग से उपयोग कैसे कर सकते हैं?",
    options: [
      "A. केवल संपर्क विवरण स्टोर करने के लिए",
      "B. इंटरेक्शन और फॉलो-अप को ट्रैक करने के लिए",
      "C. सीआरएम टूल्स को नजरअंदाज करें",
      "D. केवल रिपोर्ट तैयार करने के लिए",
    ],
    correctAnswer: 1,
  },
  {
    question: "सेल्स कॉल में सक्रिय सुनने की भूमिका क्या है?",
    options: [
      "A. कोई नहीं",
      "B. यह ग्राहक की जरूरतों को समझने में मदद करता है",
      "C. यह कॉल को अनावश्यक रूप से लंबा कर देता है",
      "D. यह सेल्सपर्सन को विचलित करता है",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आपको उस संभावित ग्राहक से कैसे संपर्क करना चाहिए जिसने पहले आपका प्रस्ताव अस्वीकार कर दिया है?",
    options: [
      "A. उन्हें नजरअंदाज करें",
      "B. उन्हें नए प्रस्ताव के साथ संपर्क करें",
      "C. उनसे बहस करें",
      "D. उनसे पूछें कि उन्होंने क्यों अस्वीकार किया",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आउटबाउंड सेल्स कॉल के दौरान समय का प्रबंधन करने का प्रभावी तरीका कौन सा है?",
    options: [
      "A. प्रत्येक कॉल पर जितना संभव हो उतना समय व्यतीत करें",
      "B. एक स्क्रिप्ट रखें और कॉल को संक्षिप्त रखें",
      "C. कॉल के दौरान मल्टीटास्क करें",
      "D. फॉलो-अप से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "प्रत्येक सेल्स कॉल के लिए स्पष्ट उद्देश्यों को निर्धारित करने का महत्व क्या है?",
    options: [
      "A. यह समय बर्बाद करता है",
      "B. यह कॉल को फोकस करने में मदद करता है",
      "C. यह अनावश्यक है",
      "D. यह ग्राहक को भ्रमित करता है",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप अपने सेल्स पिच को बढ़ाने के लिए इंडियामार्ट की विशेषताओं का लाभ कैसे उठा सकते हैं?",
    options: [
      "A. इंडियामार्ट की विशेषताओं को नजरअंदाज करें",
      "B. कैसे वे ग्राहक की समस्याओं का समाधान करते हैं इस पर जोर दें",
      "C. उन्हें संक्षेप में उल्लेख करें",
      "D. केवल मूल्य के बारे में बात करें",
    ],
    correctAnswer: 1,
  },
  {
    question: "बिक्री में अस्वीकृति को संभालने का सबसे अच्छा तरीका क्या है?",
    options: [
      "A. इसे व्यक्तिगत रूप से लें",
      "B. इससे सीखें और सुधारें",
      "C. ग्राहक के साथ बहस करें",
      "D. आगे की कॉल करने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप संभावित ग्राहक की जरूरतों को कैसे पहचान सकते हैं?",
    options: [
      "A. मान लें कि आप उनकी जरूरतों को जानते हैं",
      "B. ओपन-एंडेड प्रश्न पूछें",
      "C. केवल अपने उत्पाद के बारे में बात करें",
      "D. उन्हें सुनने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "सेल्स कॉल में ओपन-एंडेड प्रश्नों का उपयोग करने का लाभ क्या है?",
    options: [
      "A. वे समय बर्बाद करते हैं",
      "B. वे विस्तृत प्रतिक्रियाओं को प्रोत्साहित करते हैं",
      "C. वे ग्राहक को भ्रमित करते हैं",
      "D. वे अनावश्यक हैं",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप संभावित ग्राहक को इंडियामार्ट का मूल्य प्रस्ताव प्रभावी ढंग से कैसे प्रस्तुत कर सकते हैं?",
    options: [
      "A. केवल कीमत पर ध्यान केंद्रित करें",
      "B. कैसे यह उनके व्यवसाय को लाभ पहुंचाता है इसे समझाएं",
      "C. लाभों के बारे में अस्पष्ट रहें",
      "D. मूल्य प्रस्ताव का उल्लेख करने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "बिक्री प्रक्रिया में प्रतिस्पर्धा को समझने का महत्व क्या है?",
    options: [
      "A. यह अप्रासंगिक है",
      "B. यह आपके उत्पाद को पोजिशनिंग करने में मदद करता है",
      "C. यह कॉल को लंबा बनाता है",
      "D. यह महत्वपूर्ण नहीं है",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप अपनी बिक्री रणनीति में सुधार करने के लिए ग्राहक की प्रतिक्रिया का उपयोग कैसे कर सकते हैं?",
    options: [
      "A. प्रतिक्रिया को नजरअंदाज करें",
      "B. उपयोगी सुझावों का विश्लेषण और कार्यान्वयन करें",
      "C. केवल सकारात्मक प्रतिक्रिया पर ध्यान केंद्रित करें",
      "D. प्रतिक्रिया एकत्र करने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "सेल्स कॉल के सटीक रिकॉर्ड बनाए रखने का महत्व क्या है?",
    options: [
      "A. यह अनावश्यक है",
      "B. यह प्रगति और फॉलो-अप को ट्रैक करने में मदद करता है",
      "C. यह समय बर्बाद करता है",
      "D. यह सेल्सपर्सन को भ्रमित करता है",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप अपनी सेल्स कॉल की सफलता को कैसे माप सकते हैं?",
    options: [
      "A. किए गए कॉल की संख्या द्वारा",
      "B. बंद की गई बिक्री की संख्या द्वारा",
      "C. प्रत्येक कॉल की लंबाई द्वारा",
      "D. संभाली गई आपत्तियों की संख्या द्वारा",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप हिचकिचाने वाले लीड को ग्राहक में बदलने के लिए कौन सी रणनीतियाँ उपयोग कर सकते हैं?",
    options: [
      "A. उन्हें खरीदने के लिए दबाव डालें",
      "B. उनकी चिंताओं को दूर करें और समाधान प्रदान करें",
      "C. उनकी हिचकिचाहट को नजरअंदाज करें",
      "D. अवास्तविक वादे करें",
    ],
    correctAnswer: 1,
  },
  {
    question: "एक लीड को योग्य बनाने का सबसे अच्छा तरीका क्या है?",
    options: [
      "A. उनके बजट के बारे में पूछें",
      "B. उनकी विशिष्ट आवश्यकताओं और समय सीमा के बारे में पूछें",
      "C. उन्हें एक ईमेल भेजें",
      "D. बहुत अधिक प्रश्न पूछने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप उस स्थिति को कैसे संभाल सकते हैं जहां संभावित ग्राहक तुरंत निर्णय लेने के लिए तैयार नहीं है?",
    options: [
      "A. एक फॉलो-अप कॉल शेड्यूल करें",
      "B. उन्हें निर्णय लेने के लिए दबाव डालें",
      "C. तुरंत कॉल समाप्त करें",
      "D. तत्काल छूट की पेशकश करें",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "निम्नलिखित में से कौन सा संभावित ग्राहक के साथ विश्वास बनाने का एक प्रभावी तरीका है?",
    options: [
      "A. प्रशंसापत्र और केस स्टडी प्रदान करें",
      "B. केवल उत्पाद की विशेषताओं के बारे में बात करें",
      "C. कीमत पर चर्चा करने से बचें",
      "D. बढ़ा-चढ़ाकर दावे करें",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "यदि कोई संभावित ग्राहक कहता है कि वे प्रतियोगी के उत्पाद पर विचार कर रहे हैं तो आपको क्या करना चाहिए?",
    options: [
      "A. प्रतियोगी की आलोचना करें",
      "B. अपने उत्पाद के अद्वितीय लाभों को उजागर करें",
      "C. कम कीमत की पेशकश करें",
      "D. कॉल समाप्त करें",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप समय के साथ अपनी सेल्स पिच को कैसे सुधार सकते हैं?",
    options: [
      "A. सफल और असफल कॉल का विश्लेषण करें",
      "B. हमेशा एक ही स्क्रिप्ट का पालन करें",
      "C. प्रतिक्रिया मांगने से बचें",
      "D. केवल उत्पाद की विशेषताओं पर ध्यान दें",
    ],
    correctAnswer: 0,
  },
  {
    question: "ग्राहक की मूल्य आपत्ति को संभालने का एक प्रभावी तरीका क्या है?",
    options: [
      "A. उनकी चिंता को नजरअंदाज करें",
      "B. उत्पाद के मूल्य और आरओआई को समझाएं",
      "C. तुरंत कीमत कम करें",
      "D. ग्राहक से बहस करें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप कैसे निर्धारित कर सकते हैं कि कोई लीड वास्तव में रुचि रखता है?",
    options: [
      "A. वे कॉल के दौरान चुप रहते हैं",
      "B. वे विस्तृत प्रश्न पूछते हैं और अधिक जानकारी का अनुरोध करते हैं",
      "C. वे कहते हैं कि वे व्यस्त हैं",
      "D. वे आपका संपर्क विवरण पूछते हैं",
    ],
    correctAnswer: 1,
  },
  {
    question: "सेल्स में सीआरएम सिस्टम का उपयोग करने का लाभ क्या है?",
    options: [
      "A. यह वैकल्पिक है और ज्यादा उपयोगी नहीं है",
      "B. यह इंटरेक्शन को ट्रैक करने और फॉलो-अप प्रबंधित करने में मदद करता है",
      "C. यह केवल रिपोर्ट तैयार करने के लिए है",
      "D. यह व्यक्तिगत इंटरैक्शन की आवश्यकता को प्रतिस्थापित करता है",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "यदि कोई ग्राहक उस फीचर की मांग करता है जो आपके उत्पाद में नहीं है, तो आपको क्या करना चाहिए?",
    options: [
      "A. उनके अनुरोध को स्वीकार करें और वैकल्पिक विशेषताओं को समझाएं",
      "B. फीचर जोड़ने का वादा करें",
      "C. उनके अनुरोध को नजरअंदाज करें",
      "D. तर्क दें कि फीचर आवश्यक नहीं है",
    ],
    correctAnswer: 0,
  },
  {
    question: "सेल्स में सहानुभूति की भूमिका क्या है?",
    options: [
      "A. यह महत्वपूर्ण नहीं है",
      "B. यह ग्राहक के दृष्टिकोण को समझने और संबंध बनाने में मदद करता है",
      "C. यह समय बर्बाद करता है",
      "D. यह आपको कमजोर बनाता है",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप किसी कंपनी में निर्णय लेने वाले की पहचान कैसे कर सकते हैं?",
    options: [
      "A. उनकी भूमिका और निर्णय लेने के अधिकार के बारे में सीधे प्रश्न पूछें",
      "B. मान लें कि पहला संपर्क निर्णय लेने वाला है",
      "C. उनके पद के बारे में पूछने से बचें",
      "D. केवल रिसेप्शनिस्ट से बात करें",
    ],
    correctAnswer: 0,
  },
  {
    question:
      "रुचि दिखाने वाले संभावित ग्राहक के साथ फॉलो अप करने का सबसे अच्छा तरीका क्या है?",
    options: [
      "A. उनके आपको वापस कॉल करने का इंतजार करें",
      "B. एक व्यक्तिगत फॉलो-अप ईमेल या कॉल भेजें",
      "C. एक सामान्य ईमेल भेजें",
      "D. जल्द फॉलो अप करने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "ग्राहक की खरीदने की हिचकिचाहट को आप कैसे दूर कर सकते हैं?",
    options: [
      "A. उनकी चिंताओं का समाधान करें और अतिरिक्त जानकारी प्रदान करें",
      "B. उनकी हिचकिचाहट को नजरअंदाज करें",
      "C. उन्हें निर्णय लेने के लिए दबाव डालें",
      "D. अवास्तविक छूट की पेशकश करें",
    ],
    correctAnswer: 0,
  },
  {
    question: "एक अच्छी तरह से परिभाषित बिक्री प्रक्रिया का महत्व क्या है?",
    options: [
      "A. यह अनावश्यक है",
      "B. यह स्थिरता सुनिश्चित करता है और दक्षता में सुधार करता है",
      "C. यह बिक्री प्रयास को जटिल बनाता है",
      "D. यह केवल बड़ी कंपनियों के लिए है",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप अपनी सेल्स कॉल को अधिक प्रभावी कैसे बना सकते हैं?",
    options: [
      "A. बिना रुके लगातार बात करें",
      "B. सक्रिय रूप से सुनें और प्रासंगिक प्रश्न पूछें",
      "C. आपत्तियों पर चर्चा करने से बचें",
      "D. केवल स्क्रिप्ट पर ध्यान दें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "यदि कोई ग्राहक खरीदने के लिए तैयार नहीं है लेकिन उत्पाद में रुचि रखता है तो आपको क्या करना चाहिए?",
    options: [
      "A. तुरंत कॉल समाप्त करें",
      "B. उन्हें मूल्यवान जानकारी के साथ व्यस्त रखें और एक फॉलो-अप शेड्यूल करें",
      "C. उनकी रुचि को नजरअंदाज करें",
      "D. जल्दी से सौदा बंद करने के लिए छूट की पेशकश करें",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप अपनी सेल्स पिच में सामाजिक प्रमाण का उपयोग कैसे कर सकते हैं?",
    options: [
      "A. प्रशंसापत्र, समीक्षाएं और केस स्टडी साझा करें",
      "B. अन्य ग्राहकों का उल्लेख करने से बचें",
      "C. प्रतिस्पर्धियों की आलोचना करें",
      "D. मूल्य मिलान की गारंटी दें",
    ],
    correctAnswer: 0,
  },
  {
    question: "असंतुष्ट ग्राहक को संभालने का प्रभावी तरीका क्या है?",
    options: [
      "A. उनकी शिकायतों को नजरअंदाज करें",
      "B. उनकी चिंताओं को स्वीकार करें और समाधान प्रदान करें",
      "C. तर्क दें कि यह आपकी गलती नहीं थी",
      "D. तुरंत धनवापसी की पेशकश करें",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप इंडियामार्ट की विशेषताओं का लाभ कैसे उठा सकते हैं?",
    options: [
      "A. इंडियामार्ट के टूल्स को नजरअंदाज करें",
      "B. इंडियामार्ट के लीड जनरेशन टूल्स और एनालिटिक्स का उपयोग करें",
      "C. केवल कोल्ड कॉलिंग पर ध्यान दें",
      "D. डिजिटल टूल्स का उपयोग करने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "यदि कोई लीड प्रारंभिक रुचि के बाद ठंडा हो जाता है तो आपको क्या करना चाहिए?",
    options: [
      "A. उनसे संपर्क करना बंद कर दें",
      "B. उन्हें मूल्यवान सामग्री भेजें और समय-समय पर फॉलो अप करें",
      "C. मान लें कि वे रुचि नहीं रखते",
      "D. एक महत्वपूर्ण छूट की पेशकश करें",
    ],
    correctAnswer: 1,
  },
  {
    question:
      "आप अपनी सेल्स पिच को विभिन्न उद्योगों के लिए कैसे अनुकूलित कर सकते हैं?",
    options: [
      "A. सभी के लिए एक ही पिच का उपयोग करें",
      "B. प्रत्येक उद्योग की विशिष्ट आवश्यकताओं और चुनौतियों के आधार पर अपनी पिच को अनुकूलित करें",
      "C. केवल उत्पाद की विशेषताओं पर ध्यान दें",
      "D. उद्योग-विशिष्ट प्रश्न पूछने से बचें",
    ],
    correctAnswer: 1,
  },
  {
    question: "सेल्स कॉल में ओपन-एंडेड प्रश्नों का उपयोग करने का लाभ क्या है?",
    options: [
      "A. वे उपयोगी नहीं हैं",
      "B. वे ग्राहक को अधिक जानकारी साझा करने के लिए प्रोत्साहित करते हैं",
      "C. वे कॉल को लंबा बनाते हैं",
      "D. वे ग्राहक को भ्रमित करते हैं",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप कैसे सुनिश्चित कर सकते हैं कि आपकी सेल्स टीम प्रेरित रहे?",
    options: [
      "A. विफलताओं के लिए उनकी आलोचना करें",
      "B. उनकी उपलब्धियों को पहचानें और प्रोत्साहन प्रदान करें",
      "C. उनके प्रदर्शन को नजरअंदाज करें",
      "D. कोई प्रतिक्रिया न दें",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप बड़ी संख्या में लीड को कैसे प्रबंधित कर सकते हैं?",
    options: [
      "A. सभी लीड को मैन्युअल रूप से संभालें",
      "B. एक सीआरएम सिस्टम का उपयोग करके लीड को प्राथमिकता दें और ट्रैक करें",
      "C. सभी लीड का फॉलो अप करने से बचें",
      "D. केवल कुछ लीड पर ध्यान केंद्रित करें",
    ],
    correctAnswer: 1,
  },
  {
    question: "आप अपनी क्लोजिंग दर को कैसे सुधार सकते हैं?",
    options: [
      "A. बिक्री के लिए न पूछें",
      "B. बातचीत के प्रारंभ में आपत्तियों को पहचानें और संबोधित करें",
      "C. केवल उत्पाद की विशेषताओं पर ध्यान दें",
      "D. सौदों को जल्दी बंद करने के लिए छूट की पेशकश करें",
    ],
    correctAnswer: 1,
  },
];

const userForm = document.getElementById("user-form");
const quizForm = document.getElementById("quiz-form");
const startPage = document.getElementById("start-page");
const quizPage = document.getElementById("quiz-page");
const resultPage = document.getElementById("result-page");
const questionsContainer = document.getElementById("questions-container");
const resultText = document.getElementById("result-text");
const userDetails = document.getElementById("user-details");
const nextQuestionBtn = document.getElementById("next-question-btn");
const submitQuizBtn = document.getElementById("submit-quiz-btn");

let currentQuestionIndex = 0;
let selectedQuestions = [];

userForm.addEventListener("submit", function (e) {
  e.preventDefault();
  startPage.style.display = "none";
  quizPage.style.display = "block";
  loadQuiz();
  displayQuestion();
});

nextQuestionBtn.addEventListener("click", function () {
  saveAnswer();
  currentQuestionIndex++;
  if (currentQuestionIndex < selectedQuestions.length) {
    displayQuestion();
  } else {
    nextQuestionBtn.style.display = "none";
    submitQuizBtn.style.display = "block";
  }
});

quizForm.addEventListener("submit", function (e) {
  e.preventDefault();
  showResult();
});

function loadQuiz() {
  selectedQuestions = getRandomQuestions(25);
}

function displayQuestion() {
  questionsContainer.innerHTML = "";
  const question = selectedQuestions[currentQuestionIndex];
  const questionElement = document.createElement("div");
  questionElement.classList.add("question");

  const questionTitle = document.createElement("p");
  questionTitle.textContent = `${currentQuestionIndex + 1}. ${
    question.question
  }`;
  questionElement.appendChild(questionTitle);

  question.options.forEach((option, optionIndex) => {
    const optionLabel = document.createElement("label");
    const optionInput = document.createElement("input");
    optionInput.type = "radio";
    optionInput.name = `question-${currentQuestionIndex}`;
    optionInput.value = optionIndex;
    optionLabel.appendChild(optionInput);
    optionLabel.append(option);
    questionElement.appendChild(optionLabel);
    questionElement.appendChild(document.createElement("br"));
  });

  questionsContainer.appendChild(questionElement);
}

function saveAnswer() {
  const selectedOption = document.querySelector(
    `input[name="question-${currentQuestionIndex}"]:checked`
  );
  if (selectedOption) {
    selectedQuestions[currentQuestionIndex].selectedAnswer = parseInt(
      selectedOption.value
    );
  }
}

function getRandomQuestions(num) {
  const shuffled = questions.sort(() => 0.5 - Math.random());
  return shuffled.slice(0, num);
}

function showResult() {
  let score = 0;
  selectedQuestions.forEach((question, index) => {
    if (question.selectedAnswer === question.correctAnswer) {
      score += 4;
    }
  });

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;

  // Create the data object
  const data = {
    name: name,
    email: email,
    score: score,
  };

  // Post data to the API
  fetch("https://api.razorinfotech.com/api/v1/quiz/postquiz", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      // Display the result page after successfully posting the data
      quizPage.style.display = "none";
      resultPage.style.display = "block";
      resultText.textContent = `You scored ${score} out of 100`;
      userDetails.textContent = `Name: ${name} Email: ${email}`;
    })
    .catch((error) => {
      console.error("Error:", error);
      // Display the result page even if there was an error posting the data
      quizPage.style.display = "none";
      resultPage.style.display = "block";
      resultText.textContent = `You scored ${score} out of 100`;
      userDetails.textContent = `Name: ${name}, Email: ${email}`;
    });
}
