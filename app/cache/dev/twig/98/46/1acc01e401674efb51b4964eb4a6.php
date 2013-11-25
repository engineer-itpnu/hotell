<?php

/* HotelreserveBundle:customerEntity:edit.html.twig */
class __TwigTemplate_98461acc01e401674efb51b4964eb4a6 extends Twig_Template
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
        echo "<section class=\"container\"  style=\"width: 95%; margin-top: 20px; margin-bottom: 40px;\">
        <div class=\"span12 responsive\" data-tablet=\"span12 fix-margin\" data-desktop=\"span12\">
            <div class=\"\" style=\"border: 1px solid #4d3d98;display: block;\">
                <div class=\"\" style=\"background: #4d3d98;height: 36px;display: block;\">
                    <span class=\"\" style=\"float: right;margin: 2px 0 0;padding: 6px 5px 6px 10px; margin-right: 5px; color: #fff; font-size: 14px;\">
                            <a href=\"\" class=\" icon-th-large\"></a>
                            <a href=\"\" class=\"icon-chevron-left\"></a> <strong>ویرایش اطلاعات پایه ای هتل ها</strong>
                    </span>
                </div>
                <div class=\"\" style=\"display: block;padding: 25px 15px;\">
                    <div class=\"\">
                        <table class=\"table table-condensed\" style=\"width: 100%;\">
                            <tbody>

                            <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customerentity_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'enctype');
        echo ">
                                <input type=\"hidden\" name=\"_method\" value=\"PUT\"/>
                                <tr class=\"success\"><td>نام مشتری : </td><td>
                                        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_name"), 'errors');
        echo "
                                        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_name"), 'widget');
        echo "
                                    </td>
                                    <td>نام خانوادگی مشتری :
                                        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_family"), 'errors');
        echo "
                                        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_family"), 'widget');
        echo "
                                    </td>
                                </tr>
                                <tr class=\"info\">
                                    <td>ایمیل مشتری : </td>
                                    <td>
                                        ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_email"), 'errors');
        echo "
                                        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_email"), 'widget');
        echo "
                                    </td>
                                     <td> شماره تلفن مشتری :
                                        ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_phone"), 'errors');
        echo "
                                        ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_phone"), 'widget');
        echo "
                                    </td>
                                </tr>
                                <tr class=\"success\"><td>شماره موبایل مشتری : </td>
                                    <td>
                                        ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_mobile"), 'errors');
        echo "
                                        ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cust_mobile"), 'widget');
        echo "
                                    </td><td></td>
                                </tr>
                                ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'widget');
        echo "
                                <ul style=\"list-style-type: none\"><li>
                                        <button class=\"btn btn-success tabs-right\" type=\"submit\" style=\"margin-right: 400px\">ویرایش</button></li></ul>
                            </form>
                            <tr class=\"record_actions\" style=\"list-style-type: none\">
                                <td><a class=\"btn btn-primary\" href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("customerentity");
        echo "\">برگشت </a></td>
                            </tr>
                            <td>
                                ";
        // line 53
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</td>
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
        return "HotelreserveBundle:customerEntity:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 22,  134 => 63,  297 => 181,  84 => 37,  53 => 18,  65 => 24,  192 => 42,  185 => 76,  152 => 51,  34 => 9,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 88,  211 => 84,  206 => 82,  197 => 44,  188 => 38,  172 => 62,  153 => 50,  148 => 56,  97 => 48,  155 => 72,  113 => 49,  76 => 105,  127 => 61,  124 => 53,  90 => 40,  160 => 59,  137 => 62,  129 => 60,  118 => 50,  114 => 55,  110 => 45,  104 => 42,  100 => 41,  81 => 108,  77 => 27,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 109,  214 => 69,  177 => 65,  169 => 60,  140 => 54,  132 => 40,  128 => 59,  107 => 44,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 108,  208 => 68,  204 => 72,  179 => 8,  159 => 61,  143 => 46,  135 => 61,  119 => 42,  102 => 45,  71 => 19,  67 => 32,  63 => 24,  59 => 21,  38 => 6,  94 => 42,  89 => 33,  85 => 32,  75 => 30,  68 => 71,  56 => 26,  87 => 46,  21 => 2,  26 => 6,  93 => 42,  88 => 35,  78 => 31,  46 => 16,  27 => 3,  44 => 11,  31 => 3,  28 => 2,  201 => 92,  196 => 90,  183 => 68,  171 => 61,  166 => 71,  163 => 62,  158 => 73,  156 => 58,  151 => 63,  142 => 65,  138 => 44,  136 => 41,  121 => 57,  117 => 56,  105 => 44,  91 => 37,  62 => 28,  49 => 14,  24 => 4,  25 => 2,  19 => 1,  79 => 31,  72 => 30,  69 => 25,  47 => 17,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 53,  145 => 47,  139 => 45,  131 => 60,  123 => 47,  120 => 31,  115 => 43,  111 => 37,  108 => 52,  101 => 43,  98 => 39,  96 => 37,  83 => 32,  74 => 34,  66 => 12,  55 => 20,  52 => 19,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 75,  176 => 64,  173 => 65,  168 => 61,  164 => 57,  162 => 56,  154 => 58,  149 => 51,  147 => 67,  144 => 55,  141 => 48,  133 => 61,  130 => 41,  125 => 59,  122 => 58,  116 => 53,  112 => 47,  109 => 23,  106 => 46,  103 => 42,  99 => 44,  95 => 38,  92 => 36,  86 => 38,  82 => 32,  80 => 35,  73 => 26,  64 => 10,  60 => 22,  57 => 11,  54 => 8,  51 => 18,  48 => 18,  45 => 15,  42 => 10,  39 => 10,  36 => 3,  33 => 2,  30 => 5,);
    }
}
