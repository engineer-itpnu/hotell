<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_4bbf4d1df7ddfdb86e705624ec9dad61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
    </head>
    <body>
        <div>
            ";
        // line 8
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 9
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username")), "FOSUserBundle"), "html", null, true);
            echo " |
                <a href=\"";
            // line 10
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                    ";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "
                </a>
            ";
        } else {
            // line 14
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
            ";
        }
        // line 16
        echo "        </div>

        ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashBag"), "all"));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 19
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 20
                echo "                <div class=\"";
                echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
                echo "\">
                    ";
                // line 21
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), array(), "FOSUserBundle"), "html", null, true);
                echo "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "
        <div>
            ";
        // line 27
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 29
        echo "        </div>
    </body>
</html>
";
    }

    // line 27
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 28
        echo "            ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  20 => 1,  222 => 85,  200 => 78,  186 => 73,  213 => 85,  198 => 81,  184 => 71,  150 => 60,  216 => 92,  190 => 76,  180 => 70,  165 => 66,  126 => 54,  237 => 103,  207 => 88,  202 => 86,  175 => 75,  170 => 66,  146 => 63,  70 => 26,  304 => 185,  301 => 184,  194 => 75,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 18,  134 => 54,  297 => 181,  84 => 30,  53 => 18,  65 => 26,  192 => 82,  185 => 78,  152 => 60,  34 => 5,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 72,  148 => 56,  97 => 40,  155 => 58,  113 => 54,  76 => 28,  127 => 57,  124 => 50,  90 => 38,  160 => 68,  137 => 62,  129 => 43,  118 => 44,  114 => 43,  110 => 54,  104 => 45,  100 => 27,  81 => 24,  77 => 27,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 89,  220 => 109,  214 => 83,  177 => 67,  169 => 65,  140 => 54,  132 => 52,  128 => 51,  107 => 44,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 98,  224 => 71,  221 => 77,  219 => 93,  217 => 108,  208 => 80,  204 => 79,  179 => 75,  159 => 59,  143 => 60,  135 => 52,  119 => 30,  102 => 41,  71 => 24,  67 => 20,  63 => 30,  59 => 29,  38 => 6,  94 => 46,  89 => 46,  85 => 38,  75 => 38,  68 => 26,  56 => 21,  87 => 25,  21 => 2,  26 => 2,  93 => 29,  88 => 38,  78 => 32,  46 => 14,  27 => 3,  44 => 11,  31 => 9,  28 => 3,  201 => 110,  196 => 82,  183 => 71,  171 => 65,  166 => 65,  163 => 60,  158 => 62,  156 => 61,  151 => 57,  142 => 56,  138 => 55,  136 => 53,  121 => 47,  117 => 45,  105 => 49,  91 => 27,  62 => 19,  49 => 14,  24 => 1,  25 => 2,  19 => 1,  79 => 39,  72 => 21,  69 => 30,  47 => 17,  40 => 11,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 56,  139 => 64,  131 => 51,  123 => 54,  120 => 58,  115 => 49,  111 => 54,  108 => 46,  101 => 50,  98 => 33,  96 => 41,  83 => 30,  74 => 30,  66 => 22,  55 => 23,  52 => 20,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 8,  209 => 112,  203 => 78,  199 => 83,  193 => 108,  189 => 107,  187 => 80,  182 => 105,  176 => 69,  173 => 66,  168 => 77,  164 => 69,  162 => 64,  154 => 61,  149 => 57,  147 => 61,  144 => 55,  141 => 55,  133 => 38,  130 => 64,  125 => 48,  122 => 59,  116 => 48,  112 => 47,  109 => 50,  106 => 52,  103 => 28,  99 => 36,  95 => 42,  92 => 32,  86 => 41,  82 => 37,  80 => 29,  73 => 26,  64 => 25,  60 => 22,  57 => 19,  54 => 16,  51 => 22,  48 => 18,  45 => 15,  42 => 10,  39 => 10,  36 => 10,  33 => 7,  30 => 5,);
    }
}
