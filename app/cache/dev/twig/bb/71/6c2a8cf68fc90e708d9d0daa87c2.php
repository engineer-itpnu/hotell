<?php

/* HotelreserveBundle:Default:HotelRequestMoney.html.twig */
class __TwigTemplate_bb716c2a8cf68fc90e708d9d0daa87c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("HotelreserveBundle::layout_hotel.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "HotelreserveBundle::layout_hotel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <section class=\"container\" style=\"width: 95%; margin-top: 50px; margin-bottom: 50px;\">
        <div class=\"span12 responsive\" data-tablet=\"span12 fix-margin\" data-desktop=\"span12\">
            <div class=\"\" style=\"border: 1px solid #4a8bc2;display: block;\">
                <div class=\"\" style=\"background: #4a8bc2;height: 36px;display: block;\">
                    <span class=\"\"
                          style=\"float: right;margin: 2px 0 0;padding: 6px 5px 6px 10px; margin-right: 5px; color: #fff; font-size: 14px;\">
                            <a href=\"\" class=\" icon-th-large\"></a>
                            <a href=\"\" class=\"icon-chevron-left\"></a> <strong>صفحه اصلی</strong>
                    </span>
                </div>
                <div class=\"\" style=\"display: block;padding: 25px 15px;\">
                    <div class=\"\">
                        <table class=\"table table-condensed\" style=\"width: 100%;\">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:Default:HotelRequestMoney.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 134,  248 => 127,  234 => 121,  226 => 119,  223 => 118,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 20,  134 => 65,  297 => 181,  84 => 39,  53 => 12,  65 => 24,  192 => 42,  185 => 76,  152 => 51,  34 => 9,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 88,  211 => 113,  206 => 82,  197 => 109,  188 => 38,  172 => 62,  153 => 50,  148 => 56,  97 => 48,  155 => 72,  113 => 49,  76 => 20,  127 => 61,  124 => 53,  90 => 40,  160 => 59,  137 => 62,  129 => 60,  118 => 50,  114 => 55,  110 => 50,  104 => 42,  100 => 49,  81 => 31,  77 => 30,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 109,  214 => 69,  177 => 65,  169 => 60,  140 => 54,  132 => 40,  128 => 59,  107 => 53,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 81,  224 => 71,  221 => 77,  219 => 117,  217 => 108,  208 => 68,  204 => 72,  179 => 8,  159 => 61,  143 => 46,  135 => 61,  119 => 58,  102 => 40,  71 => 32,  67 => 18,  63 => 30,  59 => 29,  38 => 6,  94 => 42,  89 => 33,  85 => 24,  75 => 33,  68 => 29,  56 => 26,  87 => 34,  21 => 2,  26 => 2,  93 => 42,  88 => 25,  78 => 31,  46 => 16,  27 => 3,  44 => 11,  31 => 3,  28 => 2,  201 => 110,  196 => 90,  183 => 68,  171 => 61,  166 => 71,  163 => 62,  158 => 73,  156 => 58,  151 => 63,  142 => 65,  138 => 44,  136 => 41,  121 => 57,  117 => 57,  105 => 44,  91 => 35,  62 => 17,  49 => 11,  24 => 1,  25 => 2,  19 => 1,  79 => 21,  72 => 32,  69 => 25,  47 => 17,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 47,  139 => 45,  131 => 60,  123 => 47,  120 => 31,  115 => 43,  111 => 37,  108 => 52,  101 => 43,  98 => 39,  96 => 37,  83 => 32,  74 => 34,  66 => 31,  55 => 20,  52 => 19,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 112,  203 => 78,  199 => 67,  193 => 108,  189 => 107,  187 => 84,  182 => 105,  176 => 64,  173 => 65,  168 => 61,  164 => 57,  162 => 56,  154 => 58,  149 => 51,  147 => 67,  144 => 55,  141 => 48,  133 => 61,  130 => 64,  125 => 59,  122 => 59,  116 => 53,  112 => 55,  109 => 23,  106 => 41,  103 => 42,  99 => 45,  95 => 44,  92 => 44,  86 => 38,  82 => 37,  80 => 34,  73 => 26,  64 => 28,  60 => 16,  57 => 11,  54 => 21,  51 => 18,  48 => 18,  45 => 10,  42 => 11,  39 => 10,  36 => 3,  33 => 7,  30 => 5,);
    }
}
