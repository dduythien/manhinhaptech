<?php

class PxlDivider_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_divider';
    protected $title = 'PXL Divider';
    protected $icon = 'eicon-divider';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"horizontal":"Horizontal","vertical":"Vertical"},"default":"horizontal"},{"name":"width","label":"Width","type":"slider","control_type":"responsive","size_units":["px","%"],"default":{"size":"100","unit":"%"},"range":{"px":{"min":0,"max":10},"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-divider.horizontal .pxl-divider-separator":"width: {{SIZE}}{{UNIT}};"},"condition":{"style":"horizontal"}},{"name":"height","label":"Height","type":"slider","control_type":"responsive","size_units":["px","%"],"default":{"size":"29","unit":"px"},"range":{"px":{"min":0,"max":10},"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-divider.vertical .pxl-divider-separator":"height: {{SIZE}}{{UNIT}};"},"condition":{"style":"vertical"}},{"name":"color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-divider .pxl-divider-separator":"border-color: {{VALUE}};"}},{"name":"weight","label":"Weight","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":10}},"selectors":{"{{WRAPPER}} .pxl-divider .pxl-divider-separator":"border-width: {{SIZE}}{{UNIT}};"}},{"name":"gap","label":"Gap (px)","type":"dimensions","control_type":"responsive","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-divider":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"content_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"start":{"title":"Start","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"end":{"title":"End","icon":"eicon-text-align-right"}},"default":"","selectors":{"{{WRAPPER}} .pxl-divider":"justify-content: {{VALUE}};"}},{"name":"div_animated","label":"Animated","type":"select","options":{"":"None","animated":"Animated","animated reversal":"Animated Reversal"},"default":""},{"name":"div_animation_duration","label":"Animation Duration","type":"select","default":"normal","options":{"slow":"Slow","normal":"Normal","fast":"Fast"},"condition":{"div_animated!":""}},{"name":"div_rotate","label":"Rotate (deg)","type":"number","min":0,"step":360,"selectors":{"{{WRAPPER}} .pxl-divider .pxl-divider-separator":"transform: rotate({{VALUE}}deg);"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}