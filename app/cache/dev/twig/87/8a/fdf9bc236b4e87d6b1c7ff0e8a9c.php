<?php

/* FOSUserBundle:Resetting:request_content.html.twig */
class __TwigTemplate_878afdf9bc236b4e87d6b1c7ff0e8a9c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_send_email");
        echo "\" method=\"POST\" class=\"fos_user_resetting_request\">
    <div>
        ";
        // line 3
        if (array_key_exists("invalid_username", $context)) {
            // line 4
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.invalid_username", array("%username%" => (isset($context["invalid_username"]) ? $context["invalid_username"] : $this->getContext($context, "invalid_username"))), "FOSUserBundle"), "html", null, true);
            echo "</p>
        ";
        }
        // line 6
        echo "        <label for=\"username\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
        <input type=\"text\" id=\"username\" name=\"username\" required=\"required\" />
    </div>
    <div>
        <input type=\"submit\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:request_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  20 => 1,  222 => 85,  200 => 78,  186 => 73,  213 => 85,  198 => 81,  184 => 71,  150 => 60,  216 => 92,  190 => 76,  180 => 70,  165 => 66,  126 => 54,  237 => 103,  207 => 88,  202 => 86,  175 => 75,  170 => 66,  146 => 63,  70 => 26,  304 => 185,  301 => 184,  194 => 75,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 18,  134 => 54,  297 => 181,  84 => 30,  53 => 18,  65 => 26,  192 => 82,  185 => 78,  152 => 60,  34 => 5,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 72,  148 => 56,  97 => 40,  155 => 58,  113 => 54,  76 => 28,  127 => 57,  124 => 50,  90 => 38,  160 => 68,  137 => 62,  129 => 43,  118 => 44,  114 => 43,  110 => 54,  104 => 45,  100 => 27,  81 => 24,  77 => 26,  23 => 3,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 89,  220 => 109,  214 => 83,  177 => 67,  169 => 65,  140 => 54,  132 => 52,  128 => 51,  107 => 44,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 98,  224 => 71,  221 => 77,  219 => 93,  217 => 108,  208 => 80,  204 => 79,  179 => 75,  159 => 59,  143 => 60,  135 => 52,  119 => 30,  102 => 41,  71 => 24,  67 => 20,  63 => 30,  59 => 11,  38 => 8,  94 => 46,  89 => 46,  85 => 38,  75 => 25,  68 => 26,  56 => 10,  87 => 25,  21 => 2,  26 => 11,  93 => 29,  88 => 38,  78 => 32,  46 => 14,  27 => 4,  44 => 41,  31 => 4,  28 => 3,  201 => 110,  196 => 82,  183 => 71,  171 => 65,  166 => 65,  163 => 60,  158 => 62,  156 => 61,  151 => 57,  142 => 56,  138 => 55,  136 => 53,  121 => 47,  117 => 45,  105 => 49,  91 => 27,  62 => 19,  49 => 14,  24 => 6,  25 => 3,  19 => 1,  79 => 39,  72 => 21,  69 => 30,  47 => 17,  40 => 11,  37 => 8,  22 => 1,  246 => 90,  157 => 53,  145 => 56,  139 => 64,  131 => 51,  123 => 54,  120 => 58,  115 => 49,  111 => 54,  108 => 46,  101 => 50,  98 => 33,  96 => 41,  83 => 30,  74 => 30,  66 => 22,  55 => 23,  52 => 20,  50 => 7,  43 => 11,  41 => 10,  35 => 6,  32 => 8,  29 => 8,  209 => 112,  203 => 78,  199 => 83,  193 => 108,  189 => 107,  187 => 80,  182 => 105,  176 => 69,  173 => 66,  168 => 77,  164 => 69,  162 => 64,  154 => 61,  149 => 57,  147 => 61,  144 => 55,  141 => 55,  133 => 38,  130 => 64,  125 => 48,  122 => 59,  116 => 48,  112 => 47,  109 => 50,  106 => 52,  103 => 28,  99 => 36,  95 => 42,  92 => 32,  86 => 41,  82 => 37,  80 => 29,  73 => 26,  64 => 25,  60 => 22,  57 => 19,  54 => 16,  51 => 22,  48 => 11,  45 => 15,  42 => 8,  39 => 6,  36 => 7,  33 => 6,  30 => 1,);
    }
}
