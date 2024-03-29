<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                xmlns:fo="http://www.w3.org/1999/XSL/Format"   
                version="1.0">

    <xsl:import href="http://docbook.sourceforge.net/release/xsl/current/htmlhelp/htmlhelp.xsl"/>

    <xsl:param name="use.extensions">0</xsl:param>
    <xsl:param name="use.id.as.filename">1</xsl:param>
    <xsl:param name="base.dir">./</xsl:param>
    <xsl:param name="chunk.fast">1</xsl:param>
    <xsl:param name="make.valid.html">1</xsl:param>
    <xsl:param name="section.autolabel">1</xsl:param>
    <xsl:param name="generate.index">1</xsl:param>
    <xsl:param name="section.label.includes.component.label">1</xsl:param>
    <xsl:param name="chunker.output.indent">yes</xsl:param>
    <xsl:param name="chunker.output.encoding">UTF-8</xsl:param>
    <xsl:param name="chunk.first.sections">0</xsl:param>
    <xsl:param name="chunk.tocs.and.lots">0</xsl:param>
    <xsl:param name="html.extra.head.links">1</xsl:param>
    <xsl:param name="generate.manifest">1</xsl:param>
    <xsl:param name="admon.graphics">1</xsl:param>
    <xsl:param name="admon.style"></xsl:param>
    <xsl:param name="html.stylesheet">manual.css</xsl:param>
    <xsl:param name="header.rule">0</xsl:param>
    <xsl:param name="footer.rule">0</xsl:param>
    <xsl:param name="toc.section.depth" select="4"/>
</xsl:stylesheet>
<!--
vim:se ts=4 sw=4 et:
-->
