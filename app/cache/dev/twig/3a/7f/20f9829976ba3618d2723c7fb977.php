<?php

/* HotelreserveBundle:roomEntity:show.html.twig */
class __TwigTemplate_3a7f20f9829976ba3618d2723c7fb977 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("HotelreserveBundle::layout_admin.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "HotelreserveBundle::layout_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<section class=\"container\" style=\"width: 95%; margin-top: 20px; margin-bottom: 40px;\">
        <div class=\"span12 responsive\" data-tablet=\"span12 fix-margin\" data-desktop=\"span12\">
            <div class=\"\" style=\"border: 1px solid #74B749;display: block;\">
                <div class=\"\" style=\"background: #74B749;height: 36px;display: block;\">
                    <span class=\"\"
                          style=\"float: right;margin: 2px 0 0;padding: 6px 5px 6px 10px; margin-right: 5px; color: #fff; font-size: 14px;\">
                            <a href=\"\" class=\" icon-th-large\"></a>
                            <a href=\"\" class=\"icon-chevron-left\"></a> <strong>نمایش اطلاعات پایه هتل</strong>
                    </span>
                </div>
                <div class=\"\" style=\"display: block;padding: 25px 15px;\">
                    <table class=\"table table-condensed\" style=\"width: 100%;\">
                        <tbody>
                        <tr>
                            <th>ردیف :</th>
                            <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>نوع اتاق :</th>
                            <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "roomtype"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>نام اتاق :</th>
                            <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "roomname"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>گنجایش اتاق :</th>
                            <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "roomcapacity"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>گنجایش نفر اضافه اتاق :</th>
                            <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "roomaddCapacity"), "html", null, true);
        echo "</td>
                        </tr>
                        </tbody>
                    </table>

                    <ul class=\"record_actions\" style=\"list-style-type: none\">
                        <li>
                            <a class=\"btn btn-primary\" href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("roomentity");
        echo "\">
                                برگشت
                            </a>
                        </li>
                        <li>
                            <a class=\"btn btn-danger\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("roomentity_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
                                ویرایش اتاق
                            </a>
                        </li>
                        <li>";
        // line 50
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
                    </ul>
                    <form action=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("roomentity_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\"/>
                        ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
                    </form>
                </div>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:roomEntity:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 85,  200 => 78,  186 => 73,  213 => 85,  198 => 81,  184 => 71,  150 => 60,  216 => 92,  190 => 76,  180 => 70,  165 => 66,  126 => 54,  237 => 103,  207 => 88,  202 => 86,  175 => 75,  170 => 66,  146 => 63,  70 => 26,  304 => 185,  301 => 184,  194 => 75,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 23,  134 => 54,  297 => 181,  84 => 40,  53 => 20,  65 => 26,  192 => 82,  185 => 78,  152 => 60,  34 => 5,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 72,  148 => 56,  97 => 40,  155 => 58,  113 => 54,  76 => 34,  127 => 57,  124 => 50,  90 => 38,  160 => 68,  137 => 62,  129 => 43,  118 => 44,  114 => 43,  110 => 54,  104 => 45,  100 => 42,  81 => 34,  77 => 27,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 89,  220 => 109,  214 => 83,  177 => 67,  169 => 65,  140 => 54,  132 => 52,  128 => 51,  107 => 44,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 98,  224 => 71,  221 => 77,  219 => 93,  217 => 108,  208 => 80,  204 => 79,  179 => 75,  159 => 59,  143 => 60,  135 => 52,  119 => 30,  102 => 41,  71 => 24,  67 => 26,  63 => 30,  59 => 29,  38 => 6,  94 => 46,  89 => 46,  85 => 38,  75 => 38,  68 => 28,  56 => 21,  87 => 31,  21 => 2,  26 => 2,  93 => 47,  88 => 41,  78 => 32,  46 => 14,  27 => 3,  44 => 11,  31 => 3,  28 => 2,  201 => 110,  196 => 82,  183 => 71,  171 => 65,  166 => 65,  163 => 60,  158 => 62,  156 => 61,  151 => 57,  142 => 56,  138 => 55,  136 => 53,  121 => 47,  117 => 57,  105 => 44,  91 => 32,  62 => 26,  49 => 19,  24 => 1,  25 => 2,  19 => 1,  79 => 39,  72 => 37,  69 => 30,  47 => 17,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 56,  139 => 64,  131 => 51,  123 => 54,  120 => 49,  115 => 49,  111 => 54,  108 => 46,  101 => 50,  98 => 33,  96 => 41,  83 => 30,  74 => 31,  66 => 22,  55 => 22,  52 => 20,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 112,  203 => 78,  199 => 83,  193 => 108,  189 => 107,  187 => 80,  182 => 105,  176 => 69,  173 => 66,  168 => 77,  164 => 69,  162 => 64,  154 => 61,  149 => 57,  147 => 61,  144 => 55,  141 => 55,  133 => 38,  130 => 64,  125 => 48,  122 => 59,  116 => 48,  112 => 47,  109 => 50,  106 => 52,  103 => 43,  99 => 48,  95 => 42,  92 => 42,  86 => 41,  82 => 37,  80 => 32,  73 => 26,  64 => 27,  60 => 24,  57 => 19,  54 => 22,  51 => 19,  48 => 18,  45 => 15,  42 => 11,  39 => 9,  36 => 8,  33 => 7,  30 => 5,);
    }
}
